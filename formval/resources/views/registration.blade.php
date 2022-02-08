<html>
   <body bgcolor="grey">

<form action=" {{route ('registration.submit')}}"  method="post">

    {{@csrf_field()}}

    <h1> <u>Welcome to Registration page</u></h1>

    
Name:<input type="text"  name="username"  value="{{old('username')}}" placeholder="Enter username">
@error('username')
<span>{{$message}}</span>
@enderror

</br></br>

User ID:<input type="text"  name="userid"   value="" placeholder="Enter userID" >
@error('userid')
<span>{{$message}}</span>
@enderror

</br></br>

Email:<input type="email"  name="email" value="" placeholder="Enter Email">

@error('email')
<span>{{$message}}</span>
@enderror
</br></br>

Date Of Birth:<input type="date"   name="dob" value="{{old('username')}}" placeholder="Enter Date of birth">

@error('dob')
<span>{{$message}}</span>
@enderror
</br></br>

    

      Address:<input type="text" name="add" value=" " placeholder="Enter Address">
    
      @error('add')
<span>{{$message}}</span>
@enderror

</br></br>

   Password:<input type="password"  name="password"  value="" placeholder="Enter password">

   @error('password')
<span>{{$message}}</span>
@enderror
</br></br>


   Confrim Password:<input type="password"  name="confirmpassword"  value="{{old('password')}}" placeholder="Enter password">

@error('confirmpassword')
<span>{{$message}}</span>
@enderror
</br></br>



Profile picture:<input type="file" name="file" value="{{old('username')}}"></b>

@error('file')
<span>{{$message}}</span>
@enderror

</br></br>
                              <input type='submit' name='submit' >
     
           
                         
  </form>




</body>
</html>