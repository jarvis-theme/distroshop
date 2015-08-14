<header>
    <div id="top-head">
        <div class="container">
            <div class="user-info fl">
                <form class="navbar-form navbar-left hidden-xs" role="search" action="{{url('search')}}" method="post" style="margin: 0px;">
                    <div class="input-group">
                        <input style="margin-top: -3px;" placeholder="Search" class="form-control" type="text" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="auth-block fr">
                @if(is_login())
                Welcome, <a href="{{url('member')}}"><strong>{{user()->nama}}</strong></a>
                @else
                <ul>
                    <li class="login"><a href="{{url('member')}}">Login</a></li>
                    <li class="register"><a href="{{url('member/create')}}">Register</a></li>
                </ul>
                @endif
            </div>
            <div class="clr"></div>
        </div>
    </div> <!--.top-head-->
    <div id="center-header">
        <div class="container">
            <div id="logo" class="fl">
                <a href="{{url('home')}}"><img src="{{url(logo_image_url())}}" alt="Logo" width="313" height="151" /></a>
            </div>
            <div id="shoppingcartplace">
                {{shopping_cart()}}
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <!-- MENU - START -->
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
                        <form class="navbar-form navbar-left visible-xs" role="search" action="{{url('search')}}" method="post" style="margin: 0">
                            <div class="input-group">
                                <input placeholder="Search" class="form-control" type="text" required>
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
    <!-- MENU - END -->
    <div class="clr"></div>
</header>