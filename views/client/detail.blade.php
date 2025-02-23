@extends('client.layouts.main');

@section('content')
<section class="row">
        @include('client.layouts.partials.sidebar')
        <div class="col-md-9">
        <div class="form">
            <div class="f-left">
                <img src="{{file_url($product['p_img_thumbnail'])}}" width="555px" height="444px" alt="">
            </div>
                <div class="f-right">
                    <div class="pro-name"></div>{{$product['p_name']}} <br>
                    <div class="pro-price">{{$product['p_price']}}$</div>
                    
                    <table>
                    <tr>
                        <td style="font-size: 18px">Màu sắc: </td>
                        <td><div class="pro-color">Trắng</div></td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px">Số lượng</td>
                        <td><button class="btn btn-outline-info" onclick="tru()"><i class="fa-solid fa-minus"></i></button></td>
                        <td><input class="btn btn-outline-info" id="amount" style="width:55px; text-align:center;" type="text" value="0"></td>
                        <td><button class="btn btn-outline-info" onclick="cong()"><i class="fa-solid fa-plus"></i></button></td>
                    </tr>
                </table>
                <div class="buy">
                    <button class="btn btn-outline-success"> <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                    <input type="submit" class="btn btn-danger" value="Mua ngay">
                </div>
                </div>
        </div>
        <div class="description">
                <h2>Mô tả chi tiết</h2>
                <h5>Tên sản phẩm: {{$product['p_name']}}</h5>
                <h5>Giá tiền: {{$product['p_price']}}</h5>
                <h5>Thể loại: {{$product['c_name']}}</h5>
                <div class="desc">{{$product['p_overview']}}</div>
        </div>  
        <br><br><h4>Nội dung bình luận</h4>
        <hr>
        <div class="danh-muc-block">
            <h4 class="header" style="width: 400px; padding:3px; font-size: 28px">SẢN PHẨM LIÊN QUAN</h4>
        </div>
        
    </div>
    </section>
    



    </section>
@endsection
