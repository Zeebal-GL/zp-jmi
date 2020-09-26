@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <label >2FA Login </label></div>

                <div class="panel-body">
                @if (session('login_for'))
                    <div class="alert alert-success">
                        Congratulation. Face Login Success!. <br>
                        You are trying to login for:<b> {{ session('login_for') }} </b>
                    </div>
                @endif
                    <form class="form-horizontal" method="POST" action="/2fa/validate">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="email" class="col-md-4 control-label">Please enter your 2FA OTP</label>

                            <div class="col-md-6">
                                <input placeholder="OTP from 2FA-Device" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"  class="form-control" required name="totp" autofocus >

                                 @if($errors->has('totp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('totp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      

                        <div class="form-group">
                             <form class ="login-form" role="form" method="POST" action="/2fa/validate">
                                         {!! csrf_field() !!}
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Validate
                                </button>
                                <a class="btn btn-link"  href="{{ url('/2fa/forget2FA') }}">
                                    Know your 2FA?
                                </a>
                            </div>
                        </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
