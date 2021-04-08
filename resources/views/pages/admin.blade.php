@if(Session::has('user') && Session::get('user')[0]->role_id==2)


@extends('layouts.layout')
@section('title') Admin @endsection

@section('keywords') Blog , Admin, Post , View @endsection

@section('description') Admin page of the blog web site @endsection


@section('content')
@csrf
<div class="container-fluid tables" id="usersTable">
<h2>Users</h2>

<table>
<thead>
<tr>
<th>User ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Mail</th>
<th>Delete</th>
</tr>
</thead>

<tbody id="listUsers">

</tbody>


</table>
</div>

<div class="container-fluid tables">

<h2>Blogs</h2>

<table>
<thead><tr>
<th>User ID</th>
<th>Heading</th>
<th>Text</th>
<th class="timg">Image</th>
<th>Approved</th>
<th>Change status</th>
<th>Delete</th>

</tr>
</thead>

<tbody id="listBlogs">

</tbody>


</table>

</div>

@endsection


@else

<script>window.location.href="./"</script>

@endif
