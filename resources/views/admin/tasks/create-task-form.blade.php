@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        @include("component.error-viewer")
        <form action="{{route('tasks-store')}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <select class="form-select" aria-label=".form-select-lg example" name="task_status_id">
                        <option selected>Open this select menu</option>
                        @foreach($task_statuses as $task_status)
                            <option value="{{$task_status['id']}}">{{$task_status['title']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Задача</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Детальное описание задачи</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description"></textarea>
                </div>
            </div>

            <div class="btn">
                <button class="btn btn-primary" type="submit">Создать задачу</button>
            </div>
        </form>
    </div>
@endsection
