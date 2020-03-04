
<header class="navbar">
    <!--Start nav section-->
    @if(Request::route()->getName() == null)
    <nav class="navbar navbar-expand-md navbar-dark fixed-top nav-base dark" id="minify_nav">
        @else
        <nav class="navbar navbar-expand-md navbar-dark fixed-top nav-base dark dark-background" id="minify_nav">
            @endif
            <div class="container container-head">
                <a class="navbar-brand" href="{{ url('/') }}">                   
                    <img class="toggle-logo logo-white" width="400px;" src="{{ asset('front/images/jmi2.png') }}" alt="Logo">     </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navigation">                
                   
                    <ul class="navbar-nav ml-auto" style="position: relative;">                      

                        @if(Auth::check() && Auth::user()->user_type == 'I')
                        @include('layouts.user-inner.notify')
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ Lang::get('home-menu.Home') }} <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("search?trade_type=buy") }}">{{ Lang::get('home-menu.buy-cryptocurrency') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("search?trade_type=sell") }}">{{ Lang::get('home-menu.sell-cryptocurrency') }}</a>
                        </li>
                        @if(isset($arrTopPageData) && count($arrTopPageData) > 0)
                        @foreach($arrTopPageData as $pageData)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cms', @$pageData->slug_url)}}">{{ @$pageData->page_title }}</a>
                        </li>
                        @endforeach
                        @endif
                        <li class="nav-item"><a class="nav-link" href="
                            ">{{ Lang::get('home-menu.Post_Trade') }}</a></li>
                        <!-- Help dropdown menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link"  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Lang::get('home-menu.Help') }}<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeIn" role="menu">
                                @if(isset($arrHelpPageData) && count($arrHelpPageData) > 0)
                                @foreach($arrHelpPageData as $pageData)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('cms', @$pageData->slug_url)}}">{{ @$pageData->page_title }}</a>
                                </li>
                                @endforeach
                                @endif
                                <li><a href="">{{ Lang::get('home-menu.Frequently_Asked_Questions') }}</a></li>
                                @if(Auth::check())
                                <li><a href="{{ route('contact_support') }}">{{ Lang::get('home-menu.Contact_support') }}</a></li>
                                @endif
                                <li><a href="">{{ Lang::get('home-menu.Contact_us') }}</a></li>
                                <li><a href="{{ @$arrSettingData['blog_url'] }}" target="_blank">{{ Lang::get('home-menu.Blog') }}</a></li>
                            </ul>
                        </li>

                        @if (Auth::check())
                        @if(Auth::user()->user_type == 'A')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ ucwords(Auth::user()->fname.' '.Auth::user()->lname) }}
                            </a>
                            <ul class="dropdown-menu animated fadeIn" role="menu">
                                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-user"></i> {{ Lang::get('front/common/header.My_Profile') }}</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lock"></i>{{ Lang::get('front/common/header.Logout') }} 
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="dropdown user-sec">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user1">{{ substr(ucwords(Auth::user()->fname), 0, 1) }}</i> 
                                 <span>{{ Lang::get('front/common/header.Welcome') }} {{ ucwords(Auth::user()->fname.' '.Auth::user()->lname) }}</span> 
                            </a>
                            <ul class="dropdown-menu animated fadeIn" role="menu">
                                <li><a href="{{ route('home') }}"><i class="fa fa-th-large"></i> {{ Lang::get('front/common/header.Dashboard') }}</a></li>
                                <li><a href="{{ route('view_profile') }}"><i class="fa fa-user"></i> {{ Lang::get('front/common/header.My_Profile') }}</a></li>
                                <li>
                                    <a href="{{ route('user_wallet') }}"><i class="img">
                                            <img src="{{ asset('front/images/wallet-o.png') }}" style="width:16px" alt=""></i> {{ Lang::get('front/common/header.My_Wallet') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lock"></i> {{ Lang::get('front/common/header.Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @else
                        <li>
                            <a id="top-register-link" class="register-link nav-link" href="{{ url('register') }}">
                                <span><i class="fa fa-check-square-o"></i>{{ Lang::get('home-menu.Sign_up') }}</span>
                            </a>
                        </li>
                        <li><a id="top-login-link" href="{{ url('login') }}" class="nav-link"><i class="fa fa-user"></i>&nbsp;{{ Lang::get('home-menu.Log_in') }}</a></li>
                        @endif
                    </ul>

                    
                </div>
            </div>
        </nav>
        <!--  End nav section -->
</header>
<style>
    .notify-toggle-wrapper{ position: relative; }
    .notify-dropdown-menu{width: 330px;min-height: 300px;}
    .notify-dropdown-menu .list{min-height: 250px;}
    .notify-dropdown-menu .total{ padding: 2px 17px;}
    .notify-dropdown-menu .mark-as-read{ position: absolute;top: -8px; font-size: 10px!important;}
    .notify-dropdown-menu .small{ font-size: 12px;}
    .notify-dropdown-menu a{
        color: #000!important;
        font-size: 11px!important;
        padding: 2px 16px;
        width: 100%;
        float: left;
    }
    .notify-dropdown-menu .notice-icon{float: left!important;}
    .ms-badge {
        position: absolute;
        background: #f00;
        border-radius: 50%;
        padding: 0;
        text-align: center;
        top: 5px;
        right: -5px;
        width: 20px;
        height: 20px;
        line-height: 20px;
    }
</style>