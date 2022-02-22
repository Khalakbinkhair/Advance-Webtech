@extends('layouts.layout')
@section('content')

<div>
    <h2 class='label label-secondary'>{{$d->name}}</h2>
</div>
@if(count($d->product)>0)
<table class= "table table-bordered">
    <tr>
        <th> ID  </th>
        <th> Userid </th>
        <th> Productname </th>
        <th> Price </th>
        <th> Quantity </th>
        <th> Description </th>
</tr>
@foreach($d->product as $s)
<tr>

     <td>{{$s->id}} </td>
     <td>{{$s->userid}} </td>
     <td>{{$s->productname}} </td>
     <td>{{$s->price}} </td>
     <td>{{$s->quantity}} </td>
     <td>{{$s->description}} </td>

</tr>
@endforeach
</table>
@else
<span class="label label-info"></span><h1>None product purchase</h1>
@endif
@endsection
