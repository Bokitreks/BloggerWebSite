@if(Session::has('user') && Session::get('user')[0]->role_id==1)


@extends('layouts.layout')

@section('title') MyBlogs @endsection

@section('keywords') Blog , MyBlogs, Post , View @endsection

@section('description') MyBlogs page of the blog web site @endsection


@section('content')


<div id="createBLog">
@csrf
<p>Whats on your mind today {{Session::get('user')[0]->firstName}} ?</p>
<form action="./createBlog" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="userId" id="userId" value="{{Session::get('user')[0]->id}}"/>
<input type="text" name="createHeader" id="createHeader" placeholder="Title" required/>
<br/>
<textarea name="createText" id="createText" cols="60" rows="5" placeholder="text.." required></textarea>
<br/>
Image <input type="file" name="createImage" id="createImage" required/>
<br/>
<br/>
<input type="submit" name="submitBlog" id="submitBlog" value="Post"/>
</form>
</div>


<div class="myb" id="approvedBlogs">

<h2>Approved blogs</h2>

<div id="approved">

</div>



</div>

<div class="myb" id="notApprovedBlogs">

<h2>Not approved blogs</h2>

<div id="notApproved">

</div>

</div>

@endsection


@else

<script>window.location.href="./"</script>

@endif
