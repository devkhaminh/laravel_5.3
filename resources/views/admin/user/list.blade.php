@extends('admin.master')
@section('controller','User')
@section('action','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $user)
        <tr class="odd gradeX" align="center">
            <td>{!! $user['id'] !!}</td>
            <td>{!! $user['username'] !!}</td>
            {{-- <td>{!! $user['level'] !!}</td> --}}
            <td>
            
                @if($user['level']==1 && $user['id']==2)
                Super Admin
                @elseif($user['level']==1)
                Admin
                @else
                Member
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.user.getDelete',$user['id']) !!}" onclick="return xacnhanxoa('Bạn chắc chắn muốn xóa ???')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$user['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()