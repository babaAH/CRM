@extends('layouts.admin.crm')


@section('content')
    <div class="container">
        <div class="pb-4">
            <a class="btn btn-primary" href="{{route('users-store')}}">Создать пользователя</a>
        </div>
        <table class="table table-dark pt-4">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Имя</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users-detail', ['id' => $user->id])}}">{{$user->name}}</a></td>
                    <td><a href="{{route('users-detail', ['id' => $user->id])}}">{{$user->email}}</a></td>
                    <td>
                        <a class="btn btn-success" href="{{route('users-edit', ['id' => $user->id])}}">Изменить</a>
                        <a class="btn btn-danger" href="{{route('task-delete', ['id' => $user->id])}}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
