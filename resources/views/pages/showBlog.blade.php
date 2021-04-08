@extends('layouts.layout')

@section('title') Blog @endsection

@section('keywords') Blog , Home, Post , View @endsection

@section('description') Show Blog page of the blog web site @endsection


@section('content')
<div id="singleBlog">


<h1>{{$singleBlog[0]->heading}}</h1>

<img src="../assets/images/{{$singleBlog[0]->img}}" alt="{{$singleBlog[0]->img}}"/>

<p>{{$singleBlog[0]->text}}</p>

<p>Posted at : {{$singleBlog[0]->created_at}}</p>

<p>By: {{$singleBlog[0]->user->firstName}}</p>
</div>

@endsection