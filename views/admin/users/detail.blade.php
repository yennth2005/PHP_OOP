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
                            @foreach ($user as $key=>$value)
                                <tr>
                                    <td>{{ strtoupper($key)}}</td>
                                    <td>
                                        @switch($key)
                                            @case('avatar')
                                                <img src="{{file_url($value)}}" width="100px" alt="">
                                                @break
                                            @case('type')
                                                @if ($value =='admin')
                                                    <span class="badge bg-danger">Admin</span>
                                                @else
                                                    <span class="badge bg-info">User</span>

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
                    
                </div>
        </div>
        <a href="/admin/users" class="btn btn-warning">Trở lại</a>
        </div>
    </div>
    
    
    
@endsection
