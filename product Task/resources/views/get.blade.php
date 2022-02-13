
@extends('layouts.layout')
<center>
@section('content')

<h1><u>Product List</u></h1>

<h3> UserID:{{ $products->userid}}</br>
     UserName:{{ $products->username}}</br>
     Price:{{ $products->price}}</br> 
     Quantity:{{ $products->quantity}}</br> 
     Description:{{ $products->description}}</br> 

     </center>

@endsection
