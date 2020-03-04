<!DOCTYPE html>
<html>
    <head>
        <title>{{ Lang::get('errors/error.Too_many_requests') }}</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #000;
                display: table;
                font-weight: 100;
                font-family: Arial, Helvetica, sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 36px;
                color: #f00;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{ Lang::get('errors/error.Too_many_requests') }}</div>
                <div class="content">
                    <span>{{ Lang::get('errors/error.We_have_encountered_too_many_requests_from_IP_address') }} {{ request()->getClientIp() }}.</span>
                    <br><br>
                    <span>{{ Lang::get('errors/error.For_safety_measure') }}.</span>
                    <br>
                    <span>{{ Lang::get('errors/error.You_are_requested_to_check_back_after_1_hour') }}.</span>
                </div>
            </div>
        </div>
    </body>
</html>
