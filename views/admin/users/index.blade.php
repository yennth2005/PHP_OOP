@extends('admin.layouts.main')

@section('content')
    @include('admin.components.msg-fail')
    @include('admin.components.msg-success')

    <a class="btn btn-primary" href="/admin/users/create">Thêm mới</a>
    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ảnh</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users['data'] as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['username']}}</td>
                <td>{{$user['email']}}</td>
                <td><img width="50px" height="50px" src="{{file_url($user['avatar'])}}" alt=""></td>
                <td>{{$user['type']}}</td>
                <td>
                    <a href="/admin/users/detail/{{$user['id']}}" class="btn btn-info">Xem</a>
                    <button class="btn btn-danger" onclick="return confirm('Bạn chắc chắn chứ?')" ><a href="/admin/users/delete/{{$user['id']}}">Xoá</a></button>
                    <a class="btn btn-warning" href="/admin/users/edit/{{$user['id']}}">Sửa</a>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>
<nav aria-label="Page navigation" class="d-flex">
    <ul class="pagination">
        @for ($i = 1; $i <= $users['totalPage']; ++$i)
            <li class="page-item @if ($users['page'] == $i) active @endif">
                <a class="page-link" href="/admin/users/?page={{ $i }}&limit={{ $users['limit'] }}">{{ $i }}</a>
            </li>
        @endfor
    </ul>
</nav>
    
    {{-- <form action="/admin/users/test" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="avatar" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="avatar" id="avatar" placeholder="" aria-describedby="fileHelpId" />
            <div id="fileHelpId" class="form-text">Help text</div>
            <button type="submit">Upload</button>
        </div>
    </form> --}}
@endsection
