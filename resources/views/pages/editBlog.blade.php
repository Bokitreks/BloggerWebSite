@if(Session::has('user') && Session::get('user')[0]->id == $editBlog[0]->user_id)
@extends('layouts.layout')
@section('title') Edit BLog @endsection

@section('keywords') Blog , Edit, Post , View @endsection

@section('description') Edit Blog page of the blog web site @endsection
@section('content')
<form id="editForm" action="/updateBlog/{{$editBlog[0]->id}}"" enctype="multipart/form-data" method="POST">
@csrf
<p>Title</p>
<input type="text" name="uTitle" id="uTitle" value="{{$editBlog[0]->heading}}" required>
<p>Text</p>
<textarea name="uText" id="uText" cols="30" rows="10">
{{$editBlog[0]->text}}
</textarea>
<p>Image</p>
<img src="/assets/images/{{$editBlog[0]->img}}" alt="{{$editBlog[0]->img}}" required>
<br/>
<br/>
<input type="file" name="uImage" id="uImage"/>
<br/>
<br/>
<input type="submit" name="updateBlog" id="updateBlog" value="Update">


</form>

@endsection
@else
<!-- In case someone tries to edit a post that doesent belong to him  -->
<script>window.location.href="/"</script>

@endif
