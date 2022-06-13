@extends('layouts.visitornav')
@section('content')

<h1 class="text-success text-center">Login !</h1>

<div class="container">
    <form class="form-group w-50 mt-50 mx-auto" action="" method="post">
        {{@csrf_field()}}
        
        <label class="form-label" for="email"><b>Email</b></label>
        <input class="form-control" type="text" value="{{old('email')}}" name="email"> </br>
        @error('email')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
  
        <label class="form-label" for="password"><b>Password</b></label>
        <input class="form-control" type="password" name="password"></br>
        @error('password')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
  
        <input class="btn btn-success form-control" type="submit" value="Login">
    </form>
  
</div>


@endsection