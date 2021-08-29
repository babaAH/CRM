<?php

namespace App\Services\Task;

use App\Facades\TaskStatusFacade;
use DB;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class TaskService implements TaskServiceInterface
{
    public function create($data)
    {
        if(!$user = Auth::user()){
            throw new AuthenticationException();
        }

        if(!$user->hasPermission("create-task")){
            throw new AccessDeniedException("Недостаточно прав для этого действия");
        }

        try {
            DB::beginTransaction();
            $task_status = TaskStatusFacade::show($data["task_status_id"]);
            $task = new Task();
            $task->title = $data["title"];
            $task->description = $data["description"];
            $task->save();

            $task->task_statuses()->associate($task_status);
            $task->save();
            DB::commit();
        }catch (\Throwable $throwable){
            DB::rollback();
            throw $throwable;
        }
    }

    /**
     * @param $data
     * @param $id
     * @return Task
     * @throws \Throwable
     */
    public function update($data, $id): Task
    {
        if(!$user = Auth::user()){
            throw new AuthenticationException();
        }

        if(!$user->hasPermission("update-task")){
            throw new AccessDeniedException("Недостаточно прав для этого действия");
        }

        $task = Task::find($id);
        $task_status = TaskStatusFacade::show((int)$data["task_status_id"]);

        if($task && $task_status){
            try {
                DB::beginTransaction();

                $task->title = $data["title"];
                $task->description = $data["description"];
                $task->save();

                $task->task_statuses()->dissociate();
                $task->task_statuses()->associate($task_status);

                $task->save();
                DB::commit();
                return $task;
            }catch (\Throwable $throwable){
                DB::rollback();
                throw $throwable;
            }
        }

        throw new ModelNotFoundException("Task or Task Status not found");
    }

    public function index()
    {
        if(!$user = Auth::user()){
            throw new AuthenticationException();
        }

        if(!$user->hasPermission("read-task")){
            throw new AccessDeniedException("Недостаточно прав для этого действия");
        }

        $tasks = Task::orderBy("id", "desc")->paginate();

        return $tasks;
    }

    public function show(int $id)
    {
        if(!$user = Auth::user()){
            throw new AuthenticationException();
        }

        if(!$user->hasPermission("read-task")){
            throw new AccessDeniedException("Недостаточно прав для этого действия");
        }

        $task = Task::find($id);

        if($task){
            return $task;
        }

        return new ModelNotFoundException("Task not found");
    }

    public function delete($id)
    {
        if(!$user = Auth::user()){
            throw new AuthenticationException();
        }

        if(!$user->hasPermission("delete-task")){
            throw new AccessDeniedException("Недостаточно прав для этого действия");
        }

        try {
            DB::beginTransaction();

            $task = Task::find($id);

            if(is_null($task)){
                throw new ModelNotFoundException("Task not found");
            }

            $task->delete();

            DB::commit();

            return true;
        }catch (\Throwable $throwable){
            DB::rollback();

            throw $throwable;
        }
    }
}
