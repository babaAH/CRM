@extends("layouts.admin.crm")

@section("content")
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('updateProfile')}}" method="POST">
            @csrf
            <div class="col-lg-6 ">
                <label for="validationCustom01" class="form-label">Email</label>
                <label for=""></label>
                <input type="email" class="form-control" name="email" placeholder="{{$user->email}}">
            </div>
            <div class="col-lg-6 pt-1">
                <label for="validationCustom01" class="form-label">Имя</label>
                <label for=""></label>
                <input type="text" class="form-control" name="name" placeholder="{{$user->name}}">
            </div>
            <div class="col-lg-6 pt-1">
                <label for="validationCustom01" class="form-label">Пароль</label>
                <label for=""></label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-lg-6 pt-1">
                <label for="validationCustom01" class="form-label">Подтвердите пароль</label>
                <label for=""></label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="col-md-1 pt-3">
                <button type="submit" class="btn btn-primary"> Сохранить </button>
            </div>
        </form>
    </div>
@endsection
