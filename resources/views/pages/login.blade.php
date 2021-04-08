@if(Session::has('user'))
<script>window.location.href="./"</script>
@endif

@extends('layouts.layout')

@section('title') Login @endsection

@section('keywords') Login, Username , Password, Post , View @endsection

@section('description') Login page of the blog web site @endsection


@section('content')
<div id="loginDiv">
<h1>Login</h1>

<form>
@csrf
<p>Your email</p>
<input type="text" name="lemail" id="lemail"/>
<br/>
<span id="errorLEmail"></span>
<p>Your password</p>
<input type="password" name="lpassword" id="lpassword"/>
<br/>
<span id="errorLPassword"></span>
<br/>
<br/>
<input type="button" name="lbutton" id="lbutton" value="Login"/>
</form>
</div>
@endsection