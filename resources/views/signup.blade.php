@extends('layout.header')
@section('content')


@if (session('status'))
<h1 style="color: red">Succesfully Uploaded</h1>
    
@endif
<form action="signup" method="POST">

@csrf

    

        <div class="form-menu">
            <h2>User Registraion</h2>
             <span style="color: red">  @if ($errors->has('name'))
                               {{ $errors->first('name') }}
                                @endif</span>
            <div class="input-form">
                <label  >Name </label>
                
                <input type="text" name="name" placeholder="Enter Name....">
                
                </div>
                <div class="input-form">
                    <label  id="flabel" >Gender </label>
                    
                    <select name="gender" >
                        <option value="Male">Male</option>
                        <option value="FeMale">Female</option>
                        <option value="others">Others</option>
                    </select>
                  
            </div>
            <div class="input-form">
                <label   >DOB </label>
          
                <input type="date" name="date">
                
                </div>
                 <span style="color: red">  @if ($errors->has('email'))
                               {{ $errors->first('email') }}
                                @endif</span>
                <div class="input-form">
                    <label  placeholder="Enter Email...">Email</label>
                  
                    <input type="text"  name="email">
                    
                    </div>
                     <span style="color: red">  @if ($errors->has('phone'))
                               {{ $errors->first('phone') }}
                                @endif</span>
                     <div class="input-form">
                    <label  >Phone</label>
                  
                    <input type="text"  name="phone" placeholder="Enter Phone Number...">
                    
                    </div>
                    <span style="color: red">  @if ($errors->has('password'))
                               {{ $errors->first('password') }}
                                @endif</span>
                    <div class="input-form">
                        <label  >Password </label>
                     
                        <input type="password" name="password">
                       
                        </div>
                        
                       
                            <div class="input-form">
                                <label   >Country </label>
                               
                                <select name="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                </select>
                              
                        </div>
                          
                        <div class="input-form">
                          
                            <input type="submit" >
                            
                            </div>
              

            </div>
            
          
            
</form>
@endsection