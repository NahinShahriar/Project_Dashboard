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
            <h1>Project Dashboard</h=1>
        </div>
        <div class="rightmenu">
            <ul>

                <li class="active"><a href="{{ url('students') }}"><i class=" fa fa-home"></i> Home</a></li>
                <li><a href="{{ url('login') }}"><i class=" fa fa-sign-in"></i> Login</a></li>
                <li><a href="{{ url('signup') }}"><i class=" fa fa-sign-out"></i> Registration</a></li>
            </ul>
        </div>





    </div>

  

@yield('content')
@include('layout.footer')

    
  
    
</body>
</html>