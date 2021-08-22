
<form action="{{ $route }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">Название отдела</label>
            <input type="name" class="form-control" name="name" placeholder="{{$name ?? ''}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Сокращенное название</label>
            <input type="name" class="form-control" name="display_name" placeholder="{{$display_name ?? ''}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea class="form-control" name="description" placeholder="{{$description ?? ''}}"></textarea>
        </div>
    </div>

    <div class="fluid">
        <button type="submit" class="btn btn-primary">Применить</button>
    </div>
</form>
