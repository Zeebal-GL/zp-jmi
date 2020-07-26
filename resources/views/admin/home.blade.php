@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Admin Dashboard</h2></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3><strong>You are logged in as an <span style="color:red;">Admin</span> ! </strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 panel panel-default">
                <table class="table table-bordered table-striped table-hover" id="t01" style="width:100%">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>2FA Status</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($data)
                        @foreach($data as $user)
                            <tr class="@if($user->google2fa_secret) danger @else success @endif">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->google2fa_secret)
                                        Enable
                                    @else
                                        Disabled
                                    @endif
                                </td>
                                <td align="center">
                                    @if($user->google2fa_secret)
                                        <button type="button" class="btn btn-danger">Disable 2FA</button>
                                    @else
                                        <button type="button" class="btn btn-success">Enable 2FA</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
