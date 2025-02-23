<div class="col-md-3">
    <div class="sidebar p-3 bg-light rounded">
        <h5><i class="bi bi-box"></i> Danh Mục Sản Phẩm</h5>

        <!-- Ô tìm kiếm -->
        <input type="text" class="form-control search-box mb-3" placeholder="🔍 Tìm kiếm sản phẩm..." id="searchCategory">

        <!-- Danh sách danh mục -->
        <ul class="list-group" id="categoryList">
            @foreach ($categories as $category)
            <a href="/category/{{$category['id']}}" class="list-group-item list-group-item-action">
                <i class="bi bi-box"></i> {{ $category['name'] }}
            </a>
            @endforeach
        </ul>
    </div>
</div>
