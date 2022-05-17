@extends('layout.adminheader')

@section('content')

<h4>Total Users({{$users->count() }}) </h4>

<h4>Total Admins({{$admins->count() }}) </h4>



<table>

<thead>
 
    <tr>
      <th>serial</th>
        <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    
    <th>Country</th>
    <th>Birthdate</th>
    <th>Action</th>
   
    </tr>
</thead>
  <?php $i = 0 ?>
@foreach ($users as $item)
  <?php $i++ ?>
<tr>
   <td>{{  $i}}</td>

 

    <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
        <td>{{ $item->phone }}</td>
          <td>{{ $item->gender }}</td>
        
            <td>{{ $item->country }}</td>
            <td>{{ $item->Dob }}</td>
            <td><a href="{{ url('edituser/'.$item->id) }}"> Edit</a>
            <a href="{{ url('delete/'.$item->id) }}"> Delete</a>
          </td>
              
              
                  
</tr>
    
@endforeach
  
    
</table>
@endsection