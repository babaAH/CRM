@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        <p>
            {{$task->title}}
        </p>
        <p>
            {{$task->description}}
        </p>
    </div>
@endsection
