@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>状态</th>
            <th>分类图片</th>
            <th>创建日期</th>
            <th>更新日期</th>
            <th>操作</th>
        </tr>
        @foreach($classifieds as $classified)
        <tr>
            <td>{{$classified->id}}</td>
            <td>{{$classified->name}}</td>
            <td>@if($classified->status==1)显示@endif @if(!$classified->status==1)隐藏@endif</td>
          {{--  创建一个快捷指向storage/app/public/face(位置在public/storage)     php artisan storage:link--}}
            <td style="width: 100px">@if($classified->img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="{{($classified->img)}}"/>@endif</td>
            <td>{{$classified->created_at}}</td>
            <td>{{$classified->updated_at}}</td>
            <td>

                <a href="{{route('classified.create')}}" class="btn btn-warning">新增</a>
                <a href="{{route('classified.edit',[$classified])}}" class="btn btn-warning">修改</a>
                <form method="post" action="{{ route('classified.destroy',[$classified]) }} " style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">删除</button>
                </form>
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $classifieds->links() }}</center>

@stop