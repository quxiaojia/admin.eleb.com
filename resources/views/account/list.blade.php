@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>ID</th>
            <th>商户名</th>
            <th>店铺名</th>
            <th>token</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->shop->shop_name}}</td>
            <td>{{$user->remember_token}}</td>

            <td style="width: 200px">

                <a href="{{route('account.create')}}" class="btn btn-warning" style="margin-bottom: 5px">商户新增</a>
                <a href="{{route('account.edit',[$user])}}" class="btn btn-warning"style="margin-bottom: 5px">密码重置</a>
                 <form method="post" action="{{ route('account.destroy',[$user])}} " style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-warning">删除商户</button>
                    </form>
                <form method="post" action="{{ route('account.disable',[$user])}} " style="display: inline">
                    {{ csrf_field() }}
                    <button class="btn btn-warning">禁用商户</button>
                </form>
            </td>
        </tr>
            @endforeach
    </table>
<center>{{ $users->links() }}</center>

@stop