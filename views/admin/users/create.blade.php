@extends('admin.layouts.main')

@section('content')
    <h1>{{ $title }}</h1>
    @include('admin.components.errors')
    @include('admin.components.msg-success')
    @include('admin.components.msg-fail')

    <form action="/admin/users/insert" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" class="form-control" name="username" id="username"
                value="{{ $_SESSION['data']['username'] ?? null }}" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email"
                value="{{ $_SESSION['data']['email'] ?? null }}" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="avatar" id="avatar" />
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Role</label>
            <select class="form-select" name="type" id="type">
                <option value="">Select one</option>
                <option value="admin" {{ isset($_SESSION['data']['type']) && $_SESSION['data']['type'] == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ isset($_SESSION['data']['type']) && $_SESSION['data']['type'] == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <a href="/admin/users" class="btn btn-outline-warning">Quay lại</a>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
