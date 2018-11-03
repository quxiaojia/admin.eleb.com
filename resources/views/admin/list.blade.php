@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>ID</th>
            <th>管理员</th>
            <th>邮箱</th>
            <th>token</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->remember_token}}</td>

            <td style="width: 200px">

         <a href="{{route('admin.create')}}" class="btn btn-warning">新增</a>
                     <a href="{{route('admin.edit',[$admin])}}" class="btn btn-warning">修改</a>
                 <form method="post" action="{{ route('admin.destroy',[$admin]) }} " style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-warning">删除</button>
                    </form>
            </td>
        </tr>
            @endforeach
    </table>
<center>{{ $admins->links() }}</center>

@stop