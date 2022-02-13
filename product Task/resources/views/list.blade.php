<center>
@extends('layouts.layout')
@section('content')

<table>
    @foreach($products as $s)
    <tr>
    <td> User ID </td>
    <td> UserName</td>
    <td> Price</td>
    <td> Quantity</td>
    <td> Description</td>
</tr>
<tr>

<tr>
    
<td><a href="{{route('get',['userid'=>$s->userid])}}"> user {{$s->userid}}</a></td>
<td>{{$s->username}}</td>
<td>{{$s->price}}</td>
<td>{{$s->quantity}}</td>
<td>{{$s->description}}</td>


</tr>
@endforeach


</table>
</center>



@endsection
