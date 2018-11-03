@if(count($errors)>0)
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h5><strong>以下格式错误:</strong></h5>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
        @endforeach
</div>
@endif