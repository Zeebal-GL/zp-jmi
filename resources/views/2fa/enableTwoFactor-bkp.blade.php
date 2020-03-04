
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
    <title>JEEVS | 2FA Secret Key</title>
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
                                    <div class="login-top">
                                        <div class="mrgn-b-md">
                                            <h2 class="text-capitalize base-dark font-2x ">2FA Secret Key</h2> </div>
                                        <p class="fw-normal text-left"> Open up your 2FA mobile app and scan the following QR barcode:</p>
                                    </div>
                                </div>
                                <div class="prtm-block-content admin-login">
                                        <div class="form-group has-feedback text-center">
                                           <img alt="Image of QR barcode" src="{{ $image }}" />
                                        </div>
                                      <div class="login-meta mrgn-b-lg">
                                            <div class="row">
                                                 <div class="login-top mrgn-b-lg">
                                                <p class="fw-normal text-left"> If your 2FA mobile app does not support QR barcodes, 
                                                enter in the following number: <code>{{ $secret }}</code>
                                               </p>
                                             </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6"> <a href="{{ url('/') }}" class="text-primary password-style">Go to Login</a> </div>
                                            </div>
                                        </div>
                                                                    
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

  </body>

</html>
