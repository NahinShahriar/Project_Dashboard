@extends('layout.header')
@section('content')



@if (session('success'))
{{ session('success') }}
    
@endif

            
        <form method="post" accept="login">
            @csrf
      
           

            <div class="form-menu">
                <h2>User Login</h2>
                @php if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
                   {
                      $login_email = $_COOKIE['email'];
                      $login_pass  = $_COOKIE['password'];
                      $is_remember = "checked='checked'";
                   }
                   else{
                      $login_email ='';
                      $login_pass = '';
                      $is_remember = "";
                    }
                   @endphp
<div class="input-form">
<label >Username Or Email</label>
<input type="text" placeholder="Enter Username or email..." name="email" value="{{$login_email}}" >

</div>
<div class="input-form">
    <label >Password</label>
<input type="password"  placeholder="Enter Password..." name="password" value="{{$login_pass}}">


</div>
<div class="input-form">
    
<input type="checkbox" name="rememberme"{{$is_remember}} >Remember Me


</div>
<div class="input-form">
    <input type="submit">

</div>

            </div>

        
    </form>
    @endsection