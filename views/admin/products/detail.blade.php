@extends('admin.layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <div class="row">
        <div class="col-12 mb-4 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>Dữ liệu</th>
                                <th>Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $key=>$value)
                                <tr>
                                    <td>{{ strtoupper($key)}}</td>
                                    <td>
                                        @switch($key)
                                            
                                            @case('p_img_thumbnail')
                                                <img src="{{file_url($value)}}" width="100px" alt="">
                                                @break
                                            @case('p_is_active')
                                                @if ($value ==0)
                                                    <span class="badge bg-danger">No</span>
                                                @else
                                                    <span class="badge bg-info">Yes</span>

                                                @endif
                                                @break
                                            @case('p_is_sale')
                                                @if ($value ==0)
                                                    <span class="badge bg-danger">No</span>
                                                @else
                                                    <span class="badge bg-info">Yes</span>

                                                @endif
                                                @break
                                            @case('p_is_show_home')
                                                @if ($value ==0)
                                                    <span class="badge bg-danger">No</span>
                                                @else
                                                    <span class="badge bg-info">Yes</span>

                                                @endif
                                                @break
                                            
                                            @default
                                                {{$value}}
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                </div>
        </div>
        <a href="/admin/products" class="btn btn-warning">Trở lại</a>
        </div>
    </div>
    
    
    
@endsection
