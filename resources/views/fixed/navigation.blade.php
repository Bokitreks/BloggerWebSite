<nav>
<div class="row">

<div class="col-md-6">

<ul class="container-fluid">
@if(Session::has('user'))
<li><a href="{{route('home')}}">{{$navigation[0]->name}}</a></li>
@if(Session::get('user')[0]->role_id == 2)

<li><a href="{{route('admin')}}">Admin panel</a></li>
@else

<li><a href="{{route('myblogs')}}">My blogs</a></li>
@endif

<li><a href="{{route('logout')}}">Logout</a></li>

<li><p id="logedUser" data-id="{{Session::get('user')[0]->id}}">( {{Session::get('user')[0]->firstName}} )</p></li>

@else



@foreach($navigation as $n)
<li><a href="{{route($n->href)}}">{{$n->name}}</a></li>
@endforeach
@endif



</ul>
</div>
<div id="headerDiv" class="col-md-6">
<h1>Blogger web site</h1>
</div>

</div>
</nav>