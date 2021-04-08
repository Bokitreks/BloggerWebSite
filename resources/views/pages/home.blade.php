@extends('layouts.layout')

@section('title') Home @endsection

@section('keywords') Blog , Home, Post , View @endsection

@section('description') Home page of the blog web site @endsection


@section('content')


<h2 id="blogsHeader">Blogs</h2>

<div id="blogs" class="container-fluid">

@foreach($blogs as $blog)

@include('partials.blog')

@endforeach


</div>



@endsection