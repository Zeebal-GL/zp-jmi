@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <label >Know your 2FA </label></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/2fa/validateotp">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="email" class="col-md-4 control-label">Please Enter OTP Received on Registered Email</label>

                            <div class="col-md-6">                                
                            <input type="text" placeholder="One-Time Password" required maxlength="6" minlength="6" class="form-control" value="{{ @$data['otp'] }}" name="mailotp" autofocus>
                                 @if(Session::has('failure'))
                                    <span class="help-block"  style="color: red;text-align: center;font-size: 15px;position: relative;top: -3px;">
                                        <strong>  {{ session('failure') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>          

                        <driv class="form-group">                    
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Validate
                                </button>
                                <a class="btn btn-link"  href="{{ url('/2fa/validate') }}">
                                    <i class="fa fas fa-arrow-left"></i>&nbsp;Back
                                </a>
                            </div>
                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
