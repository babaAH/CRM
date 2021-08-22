@extends('layouts.admin.crm')

@section('content')
    <div class="container">
        @include("component.error-viewer")
        @include("component.create-or-update-team-form", ['route' => route('create-team')])
    </div>
@endsection
