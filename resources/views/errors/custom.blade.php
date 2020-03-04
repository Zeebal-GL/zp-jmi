<!DOCTYPE html>
<html>
    <head>
        <title>{{ Lang::get('errors/error.We_have_an_error') }}!!</title>

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
                font-size: 72px;
                color: #f00;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{ Lang::get('errors/error.Stop') }}!!</div>
                <div class="content">{{ Lang::get('errors/error.We_have_encountered_an_error') }}.</div>
                <div class="content">{{ Lang::get('errors/error.Please_try_after_sometime') }}.</div>
            </div>
        </div>
    </body>
</html>
