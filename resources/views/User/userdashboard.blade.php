@extends('layout.userheader')

@section('content')
<p style="color: red;text-transform:uppercase">{{ Auth::user()->name; }}</p>

<p style="color: red;text-transform:uppercase">{{  Session::get('email')}}</p>
<p style="color: red;text-transform:uppercase">{{  Session::get('password')}}</p>

@endsection