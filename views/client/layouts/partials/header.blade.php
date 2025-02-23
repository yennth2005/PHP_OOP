<div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <!-- Dấu hiệu chỉ mục -->
        <div class="carousel-indicators">
            @foreach ($banners as $index => $banner) 
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{$index}}" class="{{$index === 0 ? 'active' : ''}}"></button>
            @endforeach
        </div>

        <!-- Hình ảnh -->
        <div class="carousel-inner">
            @foreach ($banners as $index => $banner) 
                <div class="carousel-item {{$index=== 0 ? 'active' : ''}} ">
                    <img class="img_thumbnail" src="{{file_url($banner['img'])}}" class="d-block w-100" alt="{{$banner['name']}}">
                    <div class="carousel-caption">
                        <h5>{{$banner['name']}}</h5>
                        
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Nút điều hướng -->
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
