@extends('layouts.admin.crm')


@section('content')
    <div class="container">
        @include('component.error-viewer')
        <form action="{{route('task-status-update', ['id' => $task->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Название</label>
                <input class="form-control" type="text" name="title" placeholder="{{$task->title}}">
            </div>
            <div class="btn">
                <button class="btn btn-primary" type="submit">Принять изменения</button>
            </div>
        </form>
    </div>
@endsection
