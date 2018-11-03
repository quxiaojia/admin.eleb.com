@extends('layouts.default')
@section('contents')

    <div class="page-header">
        <h1 style="margin-left: 30%;font-size: 50px"><small>新增分类</small></h1>
    </div>
    @include('layouts._errors')
    <form method="post" action="{{route('classified.store')}}" enctype="multipart/form-data" style="margin-left: 30%">
        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">分类名称:</span>
                <input type="text" name="name" class="form-control"  placeholder="请输入您的用户名" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px" >
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">分类图片: </span>
                <input type="file" id="file" name="img"  style="display: none"  onchange="preview(this)"><br/>
                <div style="width: 395px; height: 200px;background-color:#FFFFCC;padding: 0" class="input-group-addon" onclick="test()">
                    <img id="face" src="/images/2.jpg" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />
                </div>
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">状态: </span>
                <select class="form-control"style="width: 395px;" name="status">
                    <option value="0">隐藏</option>
                    <option value="1">显示</option>
                </select>
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