@extends('client.layouts.main');

@section('content')
    <section class="row">
        @include('client.layouts.partials.sidebar')
        <div class="col-md-9">
            <div class="container px-3 px-lg-5 mt-5">
                {{-- {{var_dump($products)}} --}}
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products['data'] as $product)
                        {{-- {{ print_r($product)}} --}}
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                    Sale
                                </div>
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ file_url($product['p_img_thumbnail']) }}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><a
                                                style="color: #2c3e50; font-size: 1.1rem; font-weight: 600; text-decoration: none; border-bottom: 2px solid transparent; transition: color 0.3s ease, border-bottom 0.3s ease;"
                                                onmouseover="this.style.color='#e74c3c'; this.style.borderBottom='2px solid #e74c3c';"
                                                onmouseout="this.style.color='#2c3e50'; this.style.borderBottom='2px solid transparent';"
                                                class="product_link""
                                                href="/detail/{{ $product['p_id'] }}">{{ $product['p_name'] }}</a></h5>
                                        <!-- Product price-->
                                        <span
                                            class="text-muted text-decoration-line-through">{{ $product['p_price'] }}</span>

                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                            cart</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
            <nav aria-label="Page navigation" class="d-flex">
                <ul class="pagination">
                    @for ($i = 1; $i <= $products['totalPage']; ++$i)
                        <li class="page-item @if ($products['page'] == $i) active @endif">
                            <a class="page-link"
                                href="/products/?page={{ $i }}&limit={{ $products['limit'] }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>
    </section>




    </section>
@endsection
