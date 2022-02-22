@extends('layouts.layout')
@section('content')
<table class="table table-bordered">
    <tr>
        <th>  Name</th>
        <th>ID</th>
</tr>
@foreach($depts as $d)
<tr>
        <td> <a href="{{route('depts.details',['id'=>encrypt($d->id)])}}"> {{$d->name}}</a></td>
        <td>{{$d->id}}</td>
</tr>

@endforeach

@endsection('content')