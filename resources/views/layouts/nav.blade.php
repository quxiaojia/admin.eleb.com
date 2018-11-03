<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="">用户列表</a></li>
                <li><a href="">文章分类列表</a></li>
                <li><a href="">文章列表</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login/index')}}">登录</a></li>
                @endguest
                @auth
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('login')}}">退出登录</a></li>
                        <li><a href="{{route('login/edit')}}">修改个人密码</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>