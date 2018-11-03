@extends('layouts.default')
@section('contents')
    <form class="form-inline"action="{{route('activity.index')}}"  method="get" >


        {{csrf_field()}}
        <button type="submit" class="btn btn-primary" style="width: 80px;background-color: #2b669a;float: right">搜索</button>
        <div class="input-group" style="float: right">
            <span class="input-group-addon" id="basic-addon1" style="width: 60px;">活动筛选: </span>
            <select class="form-control"style="width: 250px;" name="activity_date">
                <option value="0">全部活动</option>
                <option value="1" @if($activity_date == 1) selected = "selected"@endif>未开始活动</option>
                <option value="2" @if($activity_date == 2) selected = "selected"@endif>进行中活动</option>
                <option value="3" @if($activity_date == 3) selected = "selected"@endif>已结束活动</option>
            </select>
        </div>
    </form>
    <table  class="table table-hover">
        <tr>
            <th>id</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th style="width: 200px">操作</th>
        </tr>
        @foreach($datas as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->title}}</td>
            <td>{!! $data->content !!}</td>
            <td>{{$data->start_time}}</td>
            <td>{{$data->end_time}}</td>

            <td>
                <a href="{{route('activity.create')}}" class="btn btn-warning">新增</a>
                <a href="{{route('activity.edit',[$data])}}" class="btn btn-warning">修改</a>
                <form method="post" action="{{ route('activity.destroy',[$data]) }} " style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">删除</button>
                </form>
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $datas->appends(['activity_date'=>$activity_date])->links() }}</center>

@stop