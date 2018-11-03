@extends('layouts.default')
@section('contents')

            <div class="page-header">
                <h1 style="margin-left: 30%;font-size: 50px"><small>修改密码</small></h1>
            </div>
            @include('layouts._errors')
            <form method="post" action="{{route('update')}}" enctype="multipart/form-data" style="margin-left: 30%">
                <h1 style="font-size: 40px"><small>会员密码修改：</small></h1>
                <input type="hidden" value="{{csrf_token()}}" name="remember_token">
                <div style="margin-bottom: 20px">
                    <div class="input-group ">
                        <span class="input-group-addon" id="basic-addon2" style="width: 100px;">用户名:</span>
                        <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" readonly="readonly" placeholder="请输入您要添加的管理员账号" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">旧密码: </span>
                        <input type="text" name="password1" class="form-control"   placeholder="请输入您以前密码"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>
                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">新密码: </span>
                        <input type="password" name="password2" class="form-control" placeholder="请输入您的新密码"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>
                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">确认新密码: </span>
                        <input type="password" name="password3" class="form-control" placeholder="请再次确认您的新密码"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div class="input-group">
                    <div class="btn-group btn-group-lg">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            提交
                        </button>
                    </div>
                </div>
            </form>

@stop