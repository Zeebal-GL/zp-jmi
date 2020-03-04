<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('pageTitle')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ url('/') }}/assets/site_favicon/}}" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/bootstrap-grid.css') }}" rel="stylesheet">

        <link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/flaticon.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/font-icons.css') }}" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/magnific-popup.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.theme.default.min.css') }}">

        <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/color2.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
        <style>
            .marB20 {

                margin-bottom: 20px;

            }
            .captcha-image {
                width: 100%;
                height: auto;
            }
        </style>
        @yield('css')
    </head>

    <body data-spy="scroll" data-target=".navbar">

        @include('front.common.header')

        @section('content')
        All content goes here
        @show
        @include('front.common.footer')

        <a class="btn-lg scrollup"><i class="fa fa-arrow-up"></i></a>

        <script src="{{ asset('front/js/jquery.min.js') }}"></script>
        <script src="{{ asset('front/js/popper.min.js') }}"></script>

       

        <script src="{{ asset('front/js/jquery.vide.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>

        <script src="{{ asset('front/js/jquery.waypoints.js') }}"></script>
        <script src="{{ asset('front/js/wow.js') }}"></script>

        <script src="{{ asset('front/js/TweenMax.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery.wavify.js') }}"></script>

        <script src="{{ asset('front/js/modernizr-custom.js') }}"></script>

        <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/js/custom.js') }}"></script>
         <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script type="text/javascript">

var owl = $('.owl-carousel.media');
owl.owlCarousel({
    items: 4,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 1000,
    autoplayHoverPause: true
});
$('.play').on('click', function () {
    owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function () {
    owl.trigger('stop.owl.autoplay')
});

var owl = $('.owl-carousel.announce');
owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 2000,
    //autoHeight: true
});
$(document).on('click', '.read-notification', function () {
    $.markAllRead();
});
$(document).on('click', '.read-announcement-notification', function () {
    $.markAllAnnouncementRead();
});

$.markAllRead = function (e) {
    $.ajax({
        type: 'POST',
        url: '{{url("/update-notication")}}',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        dataType: 'JSON',
        success: function (res) {
            if (res.status == "1") {
                $(".notification-span").text("0");
                $(".inner-notification-span").html("You have <strong>0</strong> new notifications.");
            }
        },
    });
};
$.markAllAnnouncementRead = function (e) {
    $.ajax({
        type: 'POST',
        url: '{{url("/update-announcement-notication")}}',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        dataType: 'JSON',
        success: function (res) {
            if (res.status == "1") {
                $(".announcement-span").text("0");
                $(".inner-announcement-span").html("You have <strong>0</strong> new notifications.");
            }
        },
    });
};


$('.captcha-img').on('click', function () {
    var captcha = $(this);
    var config = captcha.data('refresh-config');
    $.ajax({
        method: 'GET',
        url: '/ajax/get-captcha/' + config,
    }).done(function (response) {
        $(".captcha-image").prop('src', response);
    });


});

<?php if (@$errors->first('dispute_issue') != '' || @$errors->first('upload_file') != '') { ?>
    $('#raise-your-issue').modal('show');
<?php } ?>
    
<?php if(@$errors->first('fiat_receipt') != ''){ ?>
    $('#buyer-confirm-popup').modal('show');
<?php } ?>    
        </script>
        @yield('jscript')
    </body>

</html>