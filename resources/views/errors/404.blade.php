<!DOCTYPE html>
<html>
    <head>
        <title>404 - {{ Lang::get('errors/error.Not_found') }}</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.png') }}" type="image/x-icon" />
        <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" href="{{ asset('front/assets/images/apple-touch-icon-57-precomposed.png') }}">
        <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('front/assets/images/apple-touch-icon-114-precomposed.png') }}">
        <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('front/assets/images/apple-touch-icon-72-precomposed.png') }}">
        <!-- For iPad Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('front/assets/images/apple-touch-icon-144-precomposed.png') }}">

        <!-- CORE CSS FRAMEWORK - START -->
        <link href="{{ asset('front/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('front/assets/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <section class="box nobox ">
                        <div class="content-body">
                            <div class="row">
                                <div class="col-xs-12">

                                    <h1 class="page_error_code text-primary">404</h1>
                                    <h1 class="page_error_info">{{ Lang::get('errors/error.Page_Not_Found') }} </h1>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-2 col-xs-8 col-sm-6">
                                            <form action="javascript:;" method="post" class="page_error_search">
                                                <div class="text-center page_error_btn">
                                                    <a class="btn btn-primary btn-lg" href='{{ url('/') }}'>
                                                        <i class='fa fa-location-arrow'></i> &nbsp;{{ Lang::get('errors/error.Back_to_Home') }} 
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>