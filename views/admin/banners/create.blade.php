@extends('admin.layouts.main')

@section('content')
    <h1>{{ $title }}</h1>
    @include('admin.components.errors')
    @include('admin.components.msg-success')
    @include('admin.components.msg-fail')

    <form action="/admin/banners/insert" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$_SESSION['data']['name']??null}}"/>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="img" id="img" />
        </div>
        <div class="form-check">
            <label class="form-check-label" for="is_active"> Trạng thái </label>
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" />
        </div>
        
        <a href="/admin/banners" class="btn btn-outline-warning">Trở lại</a>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
