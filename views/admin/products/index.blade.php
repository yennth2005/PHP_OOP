@extends('admin.layouts.main')

@section('content')
    @include('admin.components.msg-fail')
    @include('admin.components.msg-success')

    <a class="btn btn-primary" href="/admin/products/create">Thêm mới</a>
    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Hình ảnh</th>
            <th>Giá gốc</th>
            <th>Giá sale</th>
            <th>Đang giảm giá?</th>
            <th>Đang hiển thị ở trang chủ?</th>
            <th>Đang được mở ?</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Thao tác</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($products['data'] as $product)
            <tr>
                <td>{{$product['p_id']}}</td>
                <td>{{$product['p_name']}}</td>
                <td>{{$product['c_name']}}</td>
                <td><img src="{{file_url($product['p_img_thumbnail'])}}" width="80px" height="80px" alt=""></td>
                <td>{{$product['p_price']}}</td>
                <td>{{$product['p_price_sale']}}</td>
                <td>
                    @if($product['p_is_sale'])
                    <span class="badge bg-success">YES</span>
                    @else
                    <span class="badge bg-danger">NO</span>
                    @endif

                </td>
                <td>
                    @if($product['p_is_show_home'])
                    <span class="badge bg-success">YES</span>
                    @else
                    <span class="badge bg-danger">NO</span>
                    @endif

                </td>
                <td>
                    @if($product['p_is_active'])
                    <span class="badge bg-success">YES</span>
                    @else
                    <span class="badge bg-danger">NO</span>
                    @endif
                </td>
                <td>{{$product['p_created_at']}}</td>
                <td>{{$product['p_updated_at']}}</td>
                <td>
                    <a href="/admin/products/detail/{{$product['p_id']}}" class="btn btn-info">Xem</a>
                    <button class="btn btn-danger" onclick="return confirm('Bạn chắc chắn chứ?')" ><a href="/admin/products/delete/{{$product['p_id']}}">Xoá</a></button>
                    <a class="btn btn-warning" href="/admin/products/edit/{{$product['p_id']}}">Sửa</a>
                </td>
                {{-- {{ '<pre>'}};
                {{print_r($product)}} --}}
            </tr>
        @endforeach
        
    </tbody>
</table>
        <nav aria-label="Page navigation" class="d-flex">
            <ul class="pagination">
                @for ($i = 1; $i <= $products['totalPage']; ++$i)
                    <li class="page-item @if ($products['page'] == $i) active @endif">
                        <a class="page-link" href="/admin/products/?page={{ $i }}&limit={{ $products['limit'] }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </nav>
    

@endsection
