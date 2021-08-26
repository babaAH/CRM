@extends("layouts.admin.crm")

@section('content')
    <div class="container">
        @include('component.error-viewer')

        <form action="{{route('users-update', ['id' => $user->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="">Имя</label>
                    <input type="name" class="form-control" id="exampleFormControlInput1" name="name" placeholder="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="">Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="">Повторите пароль</label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
            </div>

            <div class="btn">
                <button class="btn btn-primary" type="submit">Изменить</button>
            </div>
        </form>
    </div>
@endsection
