@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>ID</th>
            <th>用户名</th>
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
            <th>商家分类</th>
            <th>操作</th>
        </tr>
        @foreach($business as $busines)
        <tr>
            <td>{{$busines->id}}</td>
            <td>{{$busines->name}}</td>
            <td>{{$busines->shop->shop_name}}</td>
           {{-- <td>{{($busines->img)}}</td>--}}
          {{--  创建一个快捷指向storage/app/public/face(位置在public/storage)     php artisan storage:link--}}
          <td style="width: 100px">@if($busines->shop->shop_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="{{($busines->shop->shop_img)}}"/>@endif
              @if(!$busines->shop->shop_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="/images/7.jpg"/>@endif
          </td>
           <td>{{$busines->shop->shop_rating}}</td>
            <td>@if($busines->shop->brand ==1)是@endif @if($busines->shop->brand !=1)否@endif</td>
            <td>@if($busines->shop->on_time ==1)是@endif @if($busines->shop->on_time !=1)否@endif</td>
            <td>@if($busines->shop->fengniao ==1)是@endif @if($busines->shop->fengniao !=1)否@endif</td>
            <td>@if($busines->shop->bao ==1)是@endif @if($busines->shop->bao !=1)否@endif</td>
            <td>@if($busines->shop->piao ==1)是@endif @if($busines->shop->piao !=1)否@endif</td>
            <td>@if($busines->shop->zhun ==1)是@endif @if($busines->shop->zhun !=1)否@endif</td>
            <td>{{$busines->shop->start_send}}</td>
            <td>{{$busines->shop->send_cost}}</td>
            <td>{{$busines->shop->notice}}</td>
            <td>{{$busines->shop->discount}}</td>
            <td>{{$busines->shop->shop_category->name}}</td>
            <td style="width: 200px">

         <a href="{{route('business.create')}}" class="btn btn-warning">新增</a>
                     <a href="{{route('business.edit',[$busines])}}" class="btn btn-warning">修改</a>
                 <form method="post" action="{{ route('business.destroy',[$busines]) }} " style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-warning">删除</button>
                    </form>
            </td>
        </tr>
            @endforeach
    </table>
<center>{{ $business->links() }}</center>

@stop