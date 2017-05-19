@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(Auth::user()->level == 1)
                    Chào Quản trị viên
                    <a href="{!! route('admin.user.list') !!}"><button class="btn btn-info">Tới trang quản trị</button></a>
                    <a href="{!! url('/trang-chu') !!}"><button class="btn btn-danger">Tới trang web</button></a>
                    @else
                    Chào Khách hàng
                    <a href="{!! url('/trang-chu') !!}"><button class="btn btn-success">Tới trang web</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
