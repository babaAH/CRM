@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        @include("component.error-viewer")
        @include("component.create-or-update-team-form", [
                'route' => route('team-update', [
                    'id' => $team->id
                ]),
                'name' => $team->name,
                'display_name' => $team->display_name,
                'description' => $team->description,
            ])
        <table class="table table-dark pt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Имя сотрудника</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
