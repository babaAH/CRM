@extends("layouts.admin.default")

@section("content")
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST" class="row" >
        @csrf
        <div class="col-lg-6 ">
            <label for="validationCustom01" class="form-label">Email</label>
            <input type="email" class="form-control" id="validationCustom01" required name="email">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-lg-6 ">
            <label for="validationCustom02" class="form-label">Пароль</label>
            <input type="password" class="form-control" required name="password">
        </div>

        <div class="col-md-1 pt-4">
            <button type="submit" class="btn btn-primary btn-block">
                Войти
            </button>
        </div>
    </form>
@endsection
