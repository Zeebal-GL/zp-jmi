<!DOCTYPE html>
<html>
    <head>
        <title>403 - {{ Lang::get('errors/error.Unauthorized_access') }}</title>

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
                <div class="title">403 - {{ Lang::get('errors/error.Unauthorized_access') }}</div>
                <div class="content">{{ Lang::get('errors/error.You_are_not_authorized') }}.</div>
            </div>
        </div>
    </body>
</html>
