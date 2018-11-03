@extends('layouts.default')
@section('contents')

    <div class="page-header">
        <h1 style="margin-left: 30%;font-size: 50px"><small>待审核</small></h1>
    </div>
    @include('layouts._errors')
       <table  class="table table-hover">
            <tr>
                <th>ID</th>
                <th>店铺名</th>
                <th>店铺图片</th>
                <th>店铺评分</th>
                <th>品牌</th>
                <th>准时送达</th>
                <th>蜂鸟配送</th>
                <th>保</th>
                <th>票</th>
                <th>准</th>
                <th>起送金额</th>
                <th>配送费</th>
                <th>店公告</th>
                <th>优惠信息</th>
                <th>操作</th>
            </tr>
            @foreach($dates as $date)
                <tr>
                    <td>{{$date->id}}</td>
                    <td>{{$date->shop_name}}</td>
                    {{-- <td>{{($busines->img)}}</td>--}}
                    {{--  创建一个快捷指向storage/app/public/face(位置在public/storage)     php artisan storage:link--}}
                    <td style="width: 100px">@if($date->shop_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="{{($date->shop_img)}}"/>@endif
                        @if(!$date->shop_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="/images/7.jpg"/>@endif
                    </td>
                    <td>{{$date->shop_rating}}</td>
                    <td>@if($date->brand ==1)是@endif @if($date->brand !=1)否@endif</td>
                    <td>@if($date->on_time ==1)是@endif @if($date->on_time !=1)否@endif</td>
                    <td>@if($date->fengniao ==1)是@endif @if($date->fengniao !=1)否@endif</td>
                    <td>@if($date->bao ==1)是@endif @if($date->bao !=1)否@endif</td>
                    <td>@if($date->piao ==1)是@endif @if($date->piao !=1)否@endif</td>
                    <td>@if($date->zhun ==1)是@endif @if($date->zhun !=1)否@endif</td>
                    <td>{{$date->start_send}}</td>
                    <td>{{$date->send_cost}}</td>
                    <td>{{$date->notice}}</td>
                    <td>{{$date->discount}}</td>
                    <td style="width: 200px">

                     {{--   <a href="{{route('examine.update',[$date])}}" class="btn btn-warning">通过</a>
                        <a href="{{route('examine.update',[$date])}}" class="btn btn-warning">禁用</a>
                       <a href="{{route('examine.edit',[$date])}}" class="btn btn-warning">修改</a>--}}
                        <form method="post" action="{{ route('examine.update',[$date])}} " style="display: inline">
                            <input type="hidden" name="adopt" value="1">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button class="btn btn-warning">通过</button>
                        </form>
                        <form method="post" action="{{ route('examine.update',[$date])}} " style="display: inline">
                            <input type="hidden" name="disable" value="1">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button class="btn btn-warning">禁用</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

@stop