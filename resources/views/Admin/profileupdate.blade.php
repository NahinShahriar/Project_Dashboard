

<form action="{{ url('update') }}" method="post">
    @csrf
    <input type="text" name="name" id="" value="{{ Auth::user()->name }}">
       <input type="text" name="email" id="" value="{{ Auth::user()->email }}">
    {{-- <input type="password" name="password" id="" value="{{ Auth::user()->password }}"> --}}
    <input type="submit">


</form>

