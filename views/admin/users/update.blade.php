@extends('admin.layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    @include('admin.components.errors')
    @include('admin.components.msg-success')
    @include('admin.components.msg-fail')
    <form action="/admin/users/update/{{$user['id']}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" class="form-control" name="username" id="username" value="{{$user['username']}}"/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user['email']}}" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="{{$user['password']}}" />
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="avatar" id="avatar"/>
            <img src="{{file_url($user['avatar'])}}" width="88px" alt="">
        </div>
        {{-- <div class="mb-3 row">
            <label for="avatar" class="col-4 col-form-label">Avatar</label>
            <div class="col-8">
                <input type="file" class="form-control" name="avatar" id="avatar" />

                <img src="{{ file_url($user['avatar']) }}" width="100px" alt="">
            </div>
        </div> --}}
        <div class="mb-3">
            <label for="type" class="form-label">Role</label>
            <select class="form-select" name="type" id="type">
                <option selected>Select one</option>
                <option value="admin"@selected($user['type']=='admin')>Admin</option>
                <option value="user" @selected($user['type']=='user')>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
        <a href="/admin/users" class="btn btn-outline-warning">Quay lại</a>
    </form>
@endsection
