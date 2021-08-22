@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        <div class="pb-4">
            <a class="btn btn-primary" href="{{route('create-team-form')}}">Создать отдел</a>
        </div>
        <table class="table table-dark pt-4">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Отдел</th>
                <th>   </th>
            </tr>
            </thead>
            <tbody>

            @foreach($teams as $team)
                <tr>
                    <td>{{$team->id}}</td>
                    <td><a href="{{route('team-detail', ['id' => $team->id])}}">{{$team->display_name}}</a></td>
                    <td>
                        <a class="btn btn-success" href="{{route('team-detail', ['id' => $team->id])}}">Изменить</a>
                        <a class="btn btn-danger" href="{{route('team-detail', ['id' => $team->id])}}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
