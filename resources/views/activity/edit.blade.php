@extends('layouts.default')
@section('contents')
    @include('vendor.ueditor.assets')
            <div class="page-header">
                <h1 style="margin-left: 30%;font-size: 50px"><small>修改活动</small></h1>
            </div>
            @include('layouts._errors')
            <form method="post" action="{{route('activity.update',[$activity])}}" enctype="multipart/form-data" style="margin-left: 30%">
                <div style="margin-bottom: 20px">
                    <div class="input-group ">
                        <span class="input-group-addon" id="basic-addon2" style="width: 100px;">活动名称:</span>
                        <input type="text" name="title" class="form-control" value="{{$activity->title}}"  placeholder="请输入您要添加的活动名称" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>


                <div style="margin-bottom: 20px">
                    <div class="input-group" style="width: 407px">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">活动详情: </span>
                        <!-- 实例化编辑器 -->

                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>
                        <!-- 编辑器容器 -->
                        <script id="container" name="content" type="text/plain">{!! $activity->content !!}</script></div>
                </div>


                <p>开始时间:{{$activity->start_time}}</p>
                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">修改开始时间:</span>
                        <input type="date" name="start_time" class="form-control"  aria-describedby="sizing-addon1" style="width: 230%;background-color:  #FFFFCC">
                    </div>
                </div>
                <p>结束时间:{{$activity->end_time}}</p>
                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">修改结束时间: </span>
                        <input type="date" name="end_time" class="form-control" placeholder="请输入您的管理员密码"   aria-describedby="sizing-addon1" style="width: 230%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div class="input-group">
                    <div class="btn-group btn-group-lg">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
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