<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZP | face Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
</head>
<body>

<div class="container">

    <div class="jumbotron">
        <h3>Face Login</h3>
        <p></p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <div class="form-group">{{ session('success') }}</div>
            <a href="/" class="btn btn-success">Try Again</a>
        </div>
    @endif

    @if(isset($results))
        {{ dd($results) }}
    @else
        <form  method="post" action="{{ route('face-login') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="type">Email</label>
                <input type="email" name="email" class="form-control">               
            </div>          
            <div class="form-group">
                <label for="photo">Upload a Photo</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success btn-lg">
            </div>
        </form>
    @endif

</div>

</body>
</html>