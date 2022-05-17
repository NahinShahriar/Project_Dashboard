<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Home|</title>
</head>
<body>




    <div class="header">


        <div class="leftmenu">
            <h1>Admin Dashboard</h=1>
        </div>
        <div class="rightmenu">
            <ul>

                <li class="active"><a href="{{ url('admindashboard') }}"><i class=" fa fa-home"></i> Home</a></li>
                <li><a href="{{ url('userview') }}"><i class=" fa fa-address-book-o"></i> Users</a></li>
              
<li>  
               <a href="{{ url('logout') }}"><i class=" fa fa-sign-out"></i> logout</a></li>

            
<li>  <a href="{{ url('profile') }}"><i class=" fa fa-address-book-o"></i> {{ Auth::user()->name }}</a></li>
              
            </ul>

           


        </div>





    </div>

  

@yield('content')
@include('layout.footer')

    
  
    
</body>
</html>