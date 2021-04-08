
<footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@if(Route::is('login'))
<script src="{{asset('assets/js/login.js')}}"></script>
@endif

@if(Route::is('register'))
<script src="{{asset('assets/js/register.js')}}"></script>
@endif

@if(Route::is('myblogs'))
<script src="{{asset('assets/js/myblogs.js')}}"></script>
@endif
@if(Route::is('admin'))
<script src="{{asset('assets/js/admin.js')}}"></script>
@endif

</footer>
  </body>
</html>