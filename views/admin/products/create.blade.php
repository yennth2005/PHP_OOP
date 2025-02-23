@extends('admin.layouts.main')

@section('content')
    <h1>{{ $title }}</h1>
    @include('admin.components.errors')
    @include('admin.components.msg-success')
    @include('admin.components.msg-fail')

    <form action="/admin/products/insert" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ $_SESSION['data']['name'] ?? null }}" />
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">Select one</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Giá gốc</label>
                    <input type="number" class="form-control" name="price" id="price"
                        value="{{ $_SESSION['data']['price'] ?? null }}" />
                </div>
                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá khuyến mại</label>
                    <input type="number" class="form-control" name="price_sale" id="price_sale"
                        value="{{ $_SESSION['data']['price_sale'] ?? null }}" />
                </div>

            </div>
            <div class="col-md-6">

                <div class="mb-3">
                    <label for="img_thumbnail" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="img_thumbnail" id="img_thumbnail" />
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" name="quantity" id="quantity"
                        value="{{ $_SESSION['data']['quantity'] ?? null }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="overview" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="overview" id="overview" rows="3">{{ $_SESSION['data']['overview'] ?? null }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea class="form-control" name="content" id="content" rows="3">{{ $_SESSION['data']['content'] ?? null }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="is_active" class="form-label">Trạng thái</label>
                    <input type="checkbox" name="is_active" id="is_active" value="1">
                </div>
                <div class="mb-3">
                    <label for="is_sale" class="form-label">Giảm giá</label>
                    <input type="checkbox" name="is_sale" id="is_sale" value="1">
                </div>
                <div class="mb-3">
                    <label for="is_show_home" class="form-label">Hiển thị ở trang chủ</label>
                    <input type="checkbox" name="is_show_home" id="is_show_home" value="1">
                </div>
            </div>
        </div>

        <a href="/admin/products" class="btn btn-outline-warning">Quay lại</a>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
