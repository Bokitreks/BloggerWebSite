@if(Session::has('user'))
<script>window.location.href="./"</script>
@endif
@extends('layouts.layout')

@section('title') Register @endsection

@section('keywords') Register, Username , Password, Post , View @endsection

@section('description') Register page of the blog web site @endsection


@section('content')
<div id="register">
<h1>Register</h1>

<form>
@csrf
<p>First name</p>


<input type="text" name="fName" id="fName"/>
<br/>
<span id="errorFN"></span>
<p>Last name</p>
<input type="text" name="lName" id="lName"/>
<br/>
<span id="errorLN"></span>
<p>Email</p>
<input type="text" name="email" id="email"/>
<br/>
<span id="errorEmail"></span>
<p>Confirm email</p>
<input type="text" name="cemail" id="cemail"/>
<br/>
<span id="errorCEmail"></span>
<p>Password</p>
<input type="password" name="password" id="password"/>
<br/>
<span id="errorPassword"></span>
<br/>
<p>Confirm password</p>
<input type="password" name="cpassword" id="cpassword"/>
<br/>
<span id="errorCPassword"></span>
<br/>
<br/>
<input type="button" name="registerButton" id="registerButton" value="Register"/>
</form>
</div>
@endsection