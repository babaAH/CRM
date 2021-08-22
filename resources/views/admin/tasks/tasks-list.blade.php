@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        <div class="pb-4">
            <a class="btn btn-primary" href="{{route('tasks-create')}}">Создать задачу</a>
        </div>
        <table class="table table-dark pt-4">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Задача</th>
                <th>   </th>
            </tr>
            </thead>
            <tbody>

            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td><a href="{{route('task-detail', ['id' => $task->id])}}">{{$task->title}}</a></td>
                    <td>
                        <a class="btn btn-success" href="{{route('task-edit', ['id' => $task->id])}}">Изменить</a>
                        <a class="btn btn-danger" href="{{route('task-delete', ['id' => $task->id])}}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
