@extends('layouts.visitornav')
@section('content')

<h1 class="text-success text-center">SIGN UP !</h1>

<div class="container">
    <form class="form-group w-50 mt-50 mx-auto" action="" method="post">
        {{@csrf_field()}}
        <label class="form-label" for="name"><b>Name</b></label>
        <input class="form-control" type="text" value="{{old('name')}}" name="name"> </br>
        @error('name')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
  
        {{-- <label class="form-label" for="id"><b>ID</b></label>
        <input class="form-control" type="text" name="id" value="{{old('id')}}"> </br>
        @error('id')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
  
        <label class="form-label" for="dob"><b>Date of Birth</b></label>
        <input class="form-control" type="date" name="dob" value="{{old('dob')}}"> </br>
        @error('dob')
        <span class="text-danger">{{$message}}</span><br>
        @enderror --}}
  
        <label class="form-label" for="email"><b>Email</b></label>
        <input class="form-control" type="text" value="{{old('email')}}" name="email"> </br>
        @error('email')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        
        {{--<label class="form-label" for="phone"><b>Phone</b></label>
        <input class="form-control" type="text" value="{{old('phone')}}" name="phone"> </br>
        @error('phone')
            <span class="text-danger">{{$message}}</span><br>
        @enderror --}}
  
        <label class="form-label" for="password"><b>Password</b></label>
        <input class="form-control" type="password"  name="password"></br>
        @error('password')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        <label class="form-label" for="conf_password"><b>Confirm Password</b></label>
        <input class="form-control" type="password" name="conf_password"></br>
        @error('conf_password')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
  
        <input class="btn btn-success form-control" type="submit" value="Register">
    </form>
  
</div>


@endsection