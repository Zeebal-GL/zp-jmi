<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
    <meta name="description" content="type_your_description_here">
    <meta content="" name="author" />
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.cdn_url').'/assets/plugins/animate/animate.min.css' }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ config('app.cdn_url').'/assets/css/pratham.min.css' }}">
    <title>JEEVS | Know your 2FA</title>
</head>

<body>
    <div class="prtm-wrapper">
        <div class="prtm-main">
            <div class="login-banner"></div>
            <div class="login-form-wrapper mrgn-b-lg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-5 center-block">
                            <div class="prtm-form-block prtm-full-block overflow-wrappper">
                                <div class="login-bar"> <img src="{{ config('app.cdn_url').'/assets/img/login-bars.png' }}" class="img-responsive" alt="login bar" width="743" height="7"> </div>
                                <div class="text-center">
                                    <div class="mrgn-b-lg">
                                    <a href="javascript:;"> <img src="{{ config('app.cdn_url').'/assets/site_logo/logo_new.png' }}" alt="login logo" class="img-responsive display-ib"> </a>
                                      </div>
                                    <div class="login-top mrgn-b-lg">
                                        <div class="mrgn-b-md">
                                            <h2 class="text-capitalize base-dark font-2x ">Know your 2FA</h2> </div>
                                        <p class="fw-normal">Please Enter OTP Received on Registered Email</p>
                                       @if(Session::has('failure'))
                                            <div class="success_message1" 
                                                style="color: red;text-align: center;font-size: 15px;position: relative;top: -3px;">
                                              {{ session('failure') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Admin Login start -->
                           
                                <div class="prtm-block-content admin-login">
                                 <form class="login-form" role="form" id="frm_edit" method="POST" action="/2fa/validateotp">
                                         {!! csrf_field() !!}

                                        <div class="form-group has-feedback">
                                           <input type="text" placeholder="One-Time Password" required maxlength="6" minlength="6" class="form-control" value="" name="mailotp">
                          
                                           
                                        </div>
                                    <div class="login-meta mrgn-b-lg">
                                            <div class="row">
                                                
                                                <div class="col-xs-6 col-sm-6 col-md-6">  <a class="text-primary password-style" href="{{ url('/2fa/validate') }}">
                                    <i class="fa fas fa-arrow-left"></i>&nbsp;Back
                                </a> </div>
                                            </div>
                                        </div>
                                   
                                     <div class="mrgn-b-lg">
                                            <button type="submit" class="btn btn-primary btn-block font-2x"> <i class="fa fa-btn fa-mobile"></i>&nbsp;&nbsp;Validate</button>
                                        </div>
                                       </form>
                                </div>
                                
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ config('app.cdn_url').'/assets/plugins/jquery/jquery-2.2.4.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/matchMedia/matchMedia.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/jquery-ui/jquery-ui.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/bootstrap/bootstrap.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/countUp/countUp.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/countdown/jquery.countdown.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/scrollspy/scrollspy.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/sparkline/jquery.sparkline.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/bootstrap-hover/bootstrap-hover.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/plugins/compose/js/bootstrap-wysihtml5.js' }}"></script>
    <script src="{{ config('app.cdn_url').'/assets/js/chart.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.cdn_url').'/assets/js/main.js' }}" type="text/javascript"></script>

     <!-- check for flash notification message --> 
     @if(Session::has('forgot_no_email'))
        <script type="text/javascript">
$(document).ready(function () {
    $('.forgot-password').fadeIn('fast');
    $('.admin-login').css('display', 'none');
});
        </script>
        @endif
        <script type="text/javascript">
            $(document).ready(function () {
                // Forgot Password
                $('#forgot-pass-id').click(function () {
                    $('.admin-login').slideUp();
                    $('.forgot-password').slideDown();
                    $('.fw-normal').text('Please Wait ......');
                    $('.success_message1').text('');
                });

                });
        </script>
</body>

</html>