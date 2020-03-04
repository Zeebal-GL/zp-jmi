@extends('layouts.web')

@section('content')
<div class="container-fluid">
    <div class="login-wrapper row">

        <div id="register" class="registerpage col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-8">
            <div class="wrap-form">
                <div class="login-form-header">
                    <img src="{{ asset('front/images/icons/signup.png') }}" alt="login-icon" style="max-width:50px">
                    <div class="login-header">
                        <h4 class="bold color-white">{{ Lang::get('auth/register.Signup_Now') }}!</h4>
                        <h4><small>{{ Lang::get('auth/register.Please_enter_your_data_to_register') }}.</small></h4>
                    </div>
                </div>

                <div class="box register">
                    <div class="box body">
                        @if($errors->any())
                        <div class="alert alert-1 dismissible" style="background: red;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Whoops!  Something Went Wrong.
                        </div>
                        @endif
                    </div>

                    <div class="content-body">
                        <form id="msg_validate" class="no-mb no-mt" novalidate="novalidate" method="POST"
                              action="{{ route('register') }}" autocomplete="off">
                            {{ csrf_field() }}
                            

                            <div class="row">
                                <div class="col-lg-6 no-pl">
                                    <div class="form-group">
                                        <label class="form-label">{{ Lang::get('auth/register.First_name') }}</label>
                                        <span class="mandetory">*</span>
                                        <div class="controls">
                                        <input type="text" name="firstname" class="form-control" placeholder="{{ Lang::get('auth/register.First_name') }}" id="firstname" autofocus="true">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 no-pl">
                                    <div class="form-group">
                                        <label class="form-label">{{ Lang::get('auth/register.Last_name') }}</label>
                                        <div class="controls">
                                        <input type="text" name="lastname" class="form-control" placeholder="{{ Lang::get('auth/register.Last_name') }}" id="lastname" autofocus="true">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 no-pr">
                                    <div class="form-group">
                                        <label class="form-label">{{ Lang::get('auth/register.Email') }}</label>
                                        <span class="mandetory">*</span>
                                        <div class="controls">
                                        <input type="text" name="email" class="form-control" placeholder="{{ Lang::get('auth/register.Email') }}" id="email" autofocus="true">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 no-pl">
                                    <div class="form-group">
                                        <label class="form-label">{{ Lang::get('auth/register.Password') }}</label>
                                        <span class="mandetory">*</span>
                                        <div class="controls" style="position: relative;">
                                        <input type="password" name="password" class="form-control" placeholder="{{ Lang::get('auth/register.Password') }}" data-indicator="pwindicator" id="password" autofocus="true">
                                            <div class="pass-hint-drop-cls" style="display: none;">
                                                <ul>
                                                    <li>
                                                        <input type="checkbox" id="length_check" disabled="" />&nbsp;
                                                        <span>{{ Lang::get('auth/register.Be_at_least_8_characters') }}</span>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="upper_check" disabled="" />&nbsp;
                                                        <span>{{ Lang::get('auth/register.Include_an_uppercase_letter') }}</span>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="lower_check" disabled="" />&nbsp;
                                                        <span>{{ Lang::get('auth/register.Include_a_lowercase_letter') }}</span>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="number_check" disabled="" />&nbsp;
                                                        <span>{{ Lang::get('auth/register.Include_a_number') }}</span>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="special_check" disabled="" />&nbsp;
                                                        <span>{{ Lang::get('auth/register.Special_character') }} (#?!@$%^&*-_)</span>
                                                    </li>
                                                </ul>
                                                <div id="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 no-pr">
                                    <div class="form-group">
                                        <label class="form-label">{{ Lang::get('auth/register.Confirm_Password') }}</label>
                                        <span class="mandetory">*</span>
                                        <div class="controls">
                                        <input type="password" name="confirm_password" class="form-control" placeholder="{{ Lang::get('auth/register.Confirm_Password') }}" id="confirm_password" autofocus="true">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 no-pl">
                                    <div class="form-group">
                                        <label class="form-label">{{ Lang::get('auth/register.Referral_Code') }}</label>
                                        <div class="controls">
                                          <input type="text" name="refer_by" class="form-control" placeholder="{{ Lang::get('auth/register.Referral_Code') }}" id="refer_by" >
                                        </div>
                                        <span class="text-danger">{{ $errors->first('refer_by') }}</span>
                                    </div>
                                </div>
                                
                                </div>

                                <div class="pull-left clearfix submit-btn">
                                    <button type="submit" id="bt-submit"  class="btn btn-primary mt-10 btn-corner right-15">{{ Lang::get('auth/register.Register') }}</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <p id="nav">
                    {{ Lang::get('auth/register.Have_an_account') }}? <a href="{{ url('login')}}">{{ Lang::get('auth/register.Login') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jscript')

<script type="text/javascript">
$(document).ready(function () {

    $('#password').bind("focusin click", function () {
        $('.pass-hint-drop-cls').slideDown();
    });

    $('#password').blur(function () {
        $('.pass-hint-drop-cls').slideUp();
    });

    $('#password').keyup(function () {
        var mval = $(this).val();
        var upperCase = new RegExp('[A-Z]');
        var lowerCase = new RegExp('[a-z]');
        var numbers = new RegExp('[0-9]');
        var special = new RegExp('[#?!@$%^&*-_]');
        
        if (mval.length >= 8 && mval.length <= 15) {
            $('#length_check').prop('checked', true);
        } else {
            $('#length_check').prop('checked', false);
        }

        if (mval.match(upperCase)) {
            $('#upper_check').prop('checked', true);
        } else {
            $('#upper_check').prop('checked', false);
        }

        if (mval.match(lowerCase)) {
            $('#lower_check').prop('checked', true);
        } else {
            $('#lower_check').prop('checked', false);
        }

        if (mval.match(numbers)) {
            $('#number_check').prop('checked', true);
        } else {
            $('#number_check').prop('checked', false);
        }

        if (special.test(mval)) {
            $('#special_check').prop('checked', true);
        } else {
            $('#special_check').prop('checked', false);
        }
    });

    jQuery(function ($) {
        $('#password').pwstrength();
    });

});
</script>

@endsection

@section('pageTitle')
{{ Lang::get('auth/register.Register_To_JMI') }}
@endsection