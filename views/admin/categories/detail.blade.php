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
                            @foreach ($cate as $key=>$value)
                                <tr>
                                    <td>{{ strtoupper($key)}}</td>
                                    <td>
                                        @switch($key)
                                            @case('img')
                                                <img src="{{file_url($value)}}" width="100px" alt="">
                                                @break
                                            @case('is_active')
                                                @if ($value)
                                                    <span class="badge bg-success">YES</span>
                                                @else
                                                    <span class="badge bg-danger">NO</span>

                                                @endif
                                                @break
                                            @case('password')
                                                ***********
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
                <a href="/admin/categories" class="btn btn-warning">Trở lại</a>
                    
                </div>
        </div>
        </div>
    </div>
    
    
    
@endsection
