@extends('admin.layouts.main')

@section('content')
    <h1>{{ $title }}</h1>
    @include('admin.components.errors')
    @include('admin.components.msg-success')
    @include('admin.components.msg-fail')
    {{-- {{ var_dump($product) }} --}}
    <form action="/admin/products/update/{{$product['p_id']}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ $product['p_name'] }}" />
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">Select one</option>
                        @foreach ($categories as $category)
                            <option {{$category['id']==$product['p_category_id'] ? 'selected' : null}} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Giá gốc</label>
                    <input type="number" class="form-control" name="price" id="price"
                        value="{{ $product['p_price'] }}" />
                </div>
                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá khuyến mại</label>
                    <input type="number" class="form-control" name="price_sale" id="price_sale"
                        value="{{ $product['p_price_sale'] }}" />
                </div>

            </div>
            <div class="col-md-6">

                <div class="mb-3">
                    <label for="img_thumbnail" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="img_thumbnail" id="img_thumbnail" />
                    <label for=""><img src="{{file_url($product['p_img_thumbnail'])}}" width="80px" alt=""></label>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" name="quantity" id="quantity"
                        value="{{ $product['p_quantity'] ?? null }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="overview" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="overview" id="overview" rows="3">{{ $product['p_overview'] ?? null }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea class="form-control" name="content" id="content" rows="3">{{ $product['p_content'] ?? null }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="is_active" class="form-label">Trạng thái</label>
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{($product['p_is_active'] ==1) ? 'checked' : null}}>
                </div>
                <div class="mb-3">
                    <label for="is_sale" class="form-label">Giảm giá</label>
                    <input type="checkbox" name="is_sale" id="is_sale" value="1" {{($product['p_is_sale'] ==1) ? 'checked' : null}}>
                </div>
                <div class="mb-3">
                    <label for="is_show_home" class="form-label">Hiển thị ở trang chủ</label>
                    <input type="checkbox" name="is_show_home" id="is_show_home" value="1" {{($product['p_is_show_home'] ==1) ? 'checked' : null}}>
                </div>
            </div>
        </div>

        <a href="/admin/products" class="btn btn-outline-warning">Quay lại</a>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
