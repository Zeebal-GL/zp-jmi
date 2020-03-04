@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <label >2FA Secret Key </label></div>
                        <div class="panel-body">                   
                             <div class="col-md-12">  
                             <p class="fw-normal text-left"> Open up your 2FA mobile app and scan the following QR barcode:
                             </p>
                            <div class="form-group has-feedback text-center">
                             <img alt="Image of QR barcode" src="{{ $image }}" />
                             </div> </div>
                        </div>
                         <hr> 
                        <div class="panel-body">                    
                            <div class="col-md-12">  
                             <p class="fw-normal text-left"> If your 2FA mobile app does not support QR barcodes, 
                                                enter in the following number: <code>{{ $secret }}</code>
                             </p>
                            </div>                           
                        </div>   
                         <div class="panel-body">   
                        <div class="form-group">                    
                            <div class="col-md-8 col-md-offset-4 ">
                                <a class="btn btn-link text-left"  href="{{ url('/login') }}">
                                    <i class="fa fas fa-arrow-left"></i>&nbsp;Go to Login
                                </a>
                            </div>
                     
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
