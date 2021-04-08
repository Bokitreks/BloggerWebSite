<div class="row blog">

<div class="col-md-4 blogImage">

<a href="./showBlog/{{$blog->id}}"><img  class="img-fluid image" src="assets/images/{{$blog->img}}" alt="{{$blog->img}}"/></a>

</div>

<div class="col-md-8 blogText">
<h3>{{$blog->heading}}</h3>

<p>Posted by : {{$blog->user->firstName}}</p>

<p>Date posted : {{$blog->created_at}}</p>

<a href="#">Edit this blog</a>

<a href="#">Delete blog</a>

</div>

</div>