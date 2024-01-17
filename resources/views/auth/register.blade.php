@extends('auth.layouts.auth')
@section('form')
    <form action="{{ route('register') }}" method="POST" id="register_form">
        @csrf
        <h1>Create Account</h1>
        <div>
            <input type="text" class="form-control" placeholder="Name" name="name" required=""/>
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
        </div>
        <div>
            <input type="email" class="form-control" placeholder="Email" name="email" required=""/>
        </div>
        <div>
            <input type="password" class="form-control" placeholder="Password"  name="password" required=""/>
        </div>
        <div>
            <input type="password" class="form-control" placeholder="Confirm Password"  name="password_confirmation" required=""/>
        </div>
        <div>
            <a class="btn btn-default submit" href="javascript:document.getElementById('register_form').submit();">Submit</a>
        </div>

        <div class="clearfix"></div>

        <div class="separator">
            <p class="change_link">Already a member ?
                <a href="{{ route('login') }}" class="to_register"> Log in </a>
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
