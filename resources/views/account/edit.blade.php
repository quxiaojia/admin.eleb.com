@extends('layouts.default')
@section('contents')

            <div class="page-header">
                <h1 style="margin-left: 30%;font-size: 50px"><small>重置密码</small></h1>
            </div>
            @include('layouts._errors')
            <form method="post" action="{{route('account.update',[$account])}}" enctype="multipart/form-data" style="margin-left: 30%">
                <div style="margin-bottom: 20px">
                    <div class="input-group ">
                        <span class="input-group-addon" id="basic-addon2" style="width: 100px;">用户名:</span>
                        <input type="text" name="name" class="form-control" value="{{$account->name}}"  placeholder="请输入您要添加的管理员账号" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>


                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">新密码: </span>
                        <input type="password" name="password1" class="form-control" placeholder="请输入您的管理员密码"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">确认密码: </span>
                        <input type="password" name="password2" class="form-control" placeholder="请输入您的管理员密码"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div class="input-group">
                    <div class="btn-group btn-group-lg">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            提交
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