<?php

namespace App\Services\User;

use DB;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\User;

class UserService implements UserServiceInterface
{
    public function create($data)
    {
        try {
            DB::beginTransaction();
            $user = new User;

            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = bcrypt($data["password"]) ?? bcrypt(Str::random(8));

            $user->save();
            DB::commit();

            return $user;
        }catch (\Throwable $throwable){
            DB::rollback();
            throw $throwable;
        }
    }

    public function update($data, $id)
    {
        $user = User::find($id);

        if(is_null($user)){
            throw new ModelNotFoundException("user not found");
        }

        try {
            DB::beginTransaction();

            if(!empty($data["name"])){
                $user->name = $data["name"];
            }elseif(!empty($data["name"])){
                $user->email = $data["email"];
            }elseif(!empty($data["password"])){
                $user->password = $data["password"];
            }

            $user->save();

            DB::commit();

            return $user;
        }catch (\Throwable $throwable){
            DB::rollback();
            throw $throwable;
        }
    }

    public function index()
    {
        $users = User::orderBy("id", "desc")->paginate();

        return $users;
    }

    public function show($id)
    {
        $user = User::find($id);

        if($user){
            return $user;
        }

        throw new ModelNotFoundException("user not found");
    }

    public function delete($id)
    {
        $user = User::find($id);

        if(is_null($user)){
            throw new ModelNotFoundException("user not found");
        }

        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();

            return true;
        }catch (\Throwable  $throwable){
            DB::rollback();
            throw $throwable;
        }
    }
}
