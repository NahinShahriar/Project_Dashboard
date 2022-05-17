

<form action="{{ url('changepassword') }}" method="post">
    @csrf

  <input type="password" name="password" id="" value="{{ Auth::user()->password }}">
    <input type="submit">


</form>
