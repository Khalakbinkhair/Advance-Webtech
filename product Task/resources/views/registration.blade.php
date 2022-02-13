@extends('layouts.layout')
@section('content')
<form action=" {{route ('reg.submit')}}"  method="post">

  {{@csrf_field()}}
  <h1> <u>Welcome to Registration page</u></h1>
  
    userID:  <input type='text' name="userid" value="{{old('userid')}}"   placeholder='Énter User ID'> 
    @error('userid')

<span>{{$message}} </span>

 @enderror

</br></br>
   
    Name:<input type='text' name="name" value="{{old('name')}}" placeholder='Ënter your Name'>
    @error('name')

<span>{{$message}} </span>

 @enderror
</br></br>
    Price: <input type='text' name="price" value="{{old('price')}}" placeholder="Enter price">
    @error('price')

<span>{{$message}} </span>

 @enderror
</br></br>
    Quantity: <input type='number' name="quantity" value="{{old('quantity')}}" placeholder="Enter Quantitiy">
    @error('quantity')

<span>{{$message}} </span>

 @enderror

</br></br>
    Description:
    </br>
    <textarea name='description' placeholder="Write description" value="{{old('description')}}">
</textarea>
@error('description')

<span>{{$message}} </span>

 @enderror
</br></br>
<input type= "submit" value='Click' >
</form>

@endsection
