@extends('layout.adminheader')

@section('content')


Name :<p style="color: red;">{{ Auth::user()->name; }}</p>
Email :<p style="color: red;">{{  Session::get('email')}}</p>
Password:<p style="color: red;">{{  Session::get('password')}}</p>
 Date Of Birth:<p style="color: red;">{{ Auth::user()->Dob; }}</p>
 
<a href="{{ url('profileupdate/') }}">Edit</a>
<a href="{{ url('changepassword/') }}">Change Password</a>













@endsection