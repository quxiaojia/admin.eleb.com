@extends('layouts.default')
@section('contents')

    <div class="page-header">
        <h1 style="margin-left: 30%;font-size: 50px"><small>修改商家</small></h1>
    </div>
    @include('layouts._errors')
    <form method="post" action="{{route('business.update',[$business])}}" enctype="multipart/form-data" style="margin-left: 30%">
        <h1 style="font-size: 40px"><small>商家信息：</small></h1>
        <input type="hidden" name="status"  value="1">
        <input type="hidden" name="id"  value="{{$business->id}}">
        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">用户名:</span>
                <input type="text" name="name" class="form-control" value="{{$business->name}}" placeholder="请输入用户名" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">修改密码: </span>
                <input type="password" name="password" class="form-control"  placeholder="输入即视为修改密码"    aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">邮箱: </span>
                <input type="email" name="email" class="form-control" value="{{$business->email}}" placeholder="请输入您的邮箱"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <h1 style="font-size: 40px"><small>店铺信息：</small></h1>

        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">店铺名称:</span>
                <input type="text" name="shop_name" class="form-control" value="{{$business->shop->shop_name}}"placeholder="输入店铺名称"  placeholder="请输入商品的名称" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">店铺分类: </span>
                <select class="form-control"style="width: 395px;" name="shop_category_id">
                    @foreach($classifieds as $classified)
                        <option value="{{$classified->id}}"@if($classified->id == $business->shop->shop_category->id) selected = "selected"@endif>{{$classified->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">优惠信息:</span>
                <input type="text" name="discount" class="form-control" value="{{$business->shop->discount}}" placeholder="输入优惠信息" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>
        <div style="margin-bottom: 20px">
            <div class="input-group " style="margin-left: 60px;">
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="1" name="brand" @if($business->shop->brand == 1)checked="checked"@endif> 品牌
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="1" name="on_time"@if($business->shop->on_time == 1)checked="checked"@endif> 准时送达
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" name="fengniao"@if($business->shop->fengniao == 1)checked="checked"@endif> 蜂鸟配送
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" name="bao"@if($business->shop->bao == 1)checked="checked"@endif> 保
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" name="piao"@if($business->shop->piao == 1)checked="checked"@endif> 票
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" name="zhun"@if($business->shop->zhun == 1)checked="checked"@endif> 准
                </label>
            </div>
        </div>
        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">起送金额:</span>
                <input type="text" name="start_send" class="form-control"  value="{{$business->shop->start_send}}" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">配送费:</span>
                <input type="text" name="send_cost" class="form-control"  value="{{$business->shop->send_cost}}" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">店公告: </span>
                <textarea class="form-control" rows="8" style="width: 395px;" name="notice">
                    @if($business->shop->notice){{$business->shop->notice}}@endif
                </textarea>
            </div>
        </div>

        <div style="margin-bottom: 20px" >
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">店铺图片: </span>
                <input type="file" id="file" name="shop_img"  style="display: none"  onchange="preview(this)"><br/>
                <div style="width: 395px; height: 200px;background-color:#FFFFCC;padding: 0" class="input-group-addon" onclick="test()">
                    @if($business->shop->shop_img) <img id="face" src="{{($business->shop->shop_img)}}" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />@endif
                     @if(!$business->shop->shop_img) <img id="face" src="/images/2.jpg" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />@endif
               {{--     <img id="face" src="/images/2.jpg" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />
                --}}</div>
            </div>
        </div>

        <div class="input-group">
            <div class="btn-group btn-group-lg">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    修改
                </button>
            </div>
        </div>
    </form>
    <script>
        function test(){
            var $file = document.getElementById('file');
            $file.click();
        }

        function preview(obj) {
            // 获取input上传的图片数据;
            var file = obj.files[0];
            // 得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
            url = window.URL.createObjectURL(file);
            //预览
            var face = document.getElementById('face');
            face.src = url;
        }
    </script>
@stop