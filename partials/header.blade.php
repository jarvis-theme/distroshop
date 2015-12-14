<header>
    <div id="top-head">
        <div class="container">
            <div class="user-info fl">
                <form class="navbar-form navbar-left hidden-xs zeromargin" action="{{URL::to('search')}}" method="post">
                    <div class="input-group">
                        <input class="form-control" id="search" type="text" name="search" placeholder="Cari Produk" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="auth-block fr">
                @if(is_login())
                Welcome, <a href="{{url('member')}}"><strong>{{user()->nama}}</strong></a>&nbsp;|&nbsp;<a href="{{url('logout')}}"><strong>Logout&nbsp;&nbsp;<i class="fa fa-sign-out"></i></strong></a>
                @else
                <ul>
                    <li class="login"><a href="{{url('member')}}">Login</a></li>
                    <li class="register"><a href="{{url('member/create')}}">Register</a></li>
                </ul>
                @endif
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div id="center-header">
        <div class="container">
            <div id="logo" class="fl">
                @if(@getimagesize(url( logo_image_url() )))
                <a href="{{url('home')}}">
                    <img src="{{url(logo_image_url())}}" alt="Logo {{Theme::place('title')}}" width="313" height="151" />
                </a>
                @else
                <br>
                <a href="{{url('home')}}" id="logotext">
                    {{ short_description(Theme::place('title'),30) }}
                </a>
                @endif
            </div>
            <div id="shoppingcartplace">{{shopping_cart()}}</div>
            <div class="clr"></div>
        </div>
    </div>
    
    <nav id="menu" class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand mobile-only" href="#">MENU</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @foreach(main_menu()->link as $link)
                    <li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
                    @endforeach
                    <li class="space-star">&nbsp;</li>
                    <li>
                        <form class="navbar-form navbar-left visible-xs zeromargin" role="search" action="{{URL::to('search')}}" method="post">
                            <div class="input-group">
                                <input placeholder="Search" class="form-control" type="text" name="search" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>                                                                                                  
        </div>
    </nav>
    <div class="clr"></div>
</header>