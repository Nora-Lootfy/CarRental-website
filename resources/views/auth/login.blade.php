@extends('auth.layouts.auth')

@section('form')
    <form action="{{ route('login') }}" method="POST" id="login_form">
        @csrf
        <h1>Login Form</h1>
        <div>
            <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
        </div>
        <div>
            <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
        </div>
        <div>
            <a class="btn btn-default submit" href="javascript:document.getElementById('login_form').submit();">Log
                in</a>
            <a class="reset_pass" href="#">Lost your password?</a>
        </div>

        <div class="clearfix"></div>

        <div class="separator">
            <p class="change_link">New to site?
                <a href="{{route('register')}}" class="to_register"> Create Account </a>
            </p>

            <div class="clearfix"></div>
            <br/>

            <div>
                <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
            </div>
        </div>
    </form>
@endsection
