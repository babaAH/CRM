@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        <div class="pb-4">
            <a class="btn btn-primary" href="{{route('create-team-form')}}">Список задач</a>
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
                        <a class="btn btn-success" href="{{route('task-update', ['id' => $team->id])}}">Изменить</a>
                        <a class="btn btn-danger" href="{{route('team-delete', ['id' => $team->id])}}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
