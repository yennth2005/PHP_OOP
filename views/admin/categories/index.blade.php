@extends('admin.layouts.main')

@section('content')
@include('admin.components.msg-fail')
@include('admin.components.msg-success')

    <a class="btn btn-primary" href="/admin/categories/create">Thêm mới</a>
    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cates as $cate)
            <tr>
                <td>{{$cate['id']}}</td>
                <td>{{$cate['name']}}</td>
                <td><img width="50px" height="50px" src="{{file_url($cate['img'])}}" alt=""></td>
                <td>
                    @if($cate['is_active'] == 1)
                        <span class="badge bg-success">YES</span>
                    @else
                        <span class="badge bg-danger">NO</span>
                    @endif
                </td>
                <td>
                    <a href="/admin/categories/detail/{{$cate['id']}}" class="btn btn-info">Xem</a>
                    <button class="btn btn-danger" onclick="return confirm('Bạn chắc chắn chứ?')"><a href="/admin/categories/delete/{{$cate['id']}}">Xoá</a></button>
                    <a class="btn btn-warning" href="/admin/categories/edit/{{$cate['id']}}">Sửa</a>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>

    
    {{-- <form action="/admin/cates/test" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="avatar" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="avatar" id="avatar" placeholder="" aria-describedby="fileHelpId" />
            <div id="fileHelpId" class="form-text">Help text</div>
            <button type="submit">Upload</button>
        </div>
    </form> --}}
@endsection

