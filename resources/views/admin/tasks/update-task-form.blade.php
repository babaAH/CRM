@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        @include("component.error-viewer")
        <form action="{{route('task-update', ['id' => $task->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <select class="form-select" aria-label=".form-select-lg example" name="task_status_id" >
                        <option value="{{$task->task_status_id}}">{{$task->task_statuses->title}}</option>
                        @foreach($task_statuses as $task_status)
                            <option value="{{$task_status['id']}}">{{$task_status['title']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Задача</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$task->title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Детальное описание задачи</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description">{{$task->description}}</textarea>
                </div>
            </div>

            <div class="btn">
                <button class="btn btn-primary" type="submit">Применить изменения</button>
            </div>
        </form>
    </div>
@endsection
