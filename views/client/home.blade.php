@extends('client.layouts.main');

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            {{-- {{var_dump($products)}} --}}
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{file_url($product['img_thumbnail'])}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a href="/detail/{{$product['id']}}">{{$product['name']}}</a></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">{{$product['price']}}</span>
                                    $25.00
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
    </section>
@endsection
