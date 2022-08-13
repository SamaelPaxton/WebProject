<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <link rel="stylesheet" >
<link rel="stylesheet" href="css/register.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
  @if(Session::has('success'))
    <div class="alert alert-success">{{session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{session::get('fail')}}</div>
    @endif
    @if(Session::has('duplicate'))
    <div class="alert alert-danger">{{session::get('duplicate')}}</div>
    @endif
  <h1>Registration</h1>

  <form action="{{route('register-user')}}" method="POST">
  @csrf
  <hr>
  <label id="icon" for="customerUsername"><i class="icon-user"></i></label>
  <input type="text" name="customerUsername" placeholder="Enter your username here" required="required" value="{{old('customerUsername')}}"/>
  <span class="text-danger">@error('customerUsername'){{$message}}@enderror</span>
  <label id="icon" for="customerPhone"><i class="icon-user"></i></label>
  <input type="text" name="customerPhone" placeholder="Enter your phone here" required="required" value="{{old('customerPhone')}}"/>
  <span class="text-danger">@error('customerPhone'){{$message}}@enderror</span>
  <label id="icon" for="customerPassword"><i class="icon-shield"></i></label>
  <input type="password" name="customerPassword" placeholder="Enter your password here" required="required" value="{{old('customerPassword')}}"/>
  <span class="text-danger">@error('customerPassword'){{$message}}@enderror</span>
  
   
   <button type="submit" class="button">Register</button>
   <p>Already have an account?<a href="{{url('login')}}">Login here</a>.</p>
   
  
  </form>
</div>
<!-- partial -->
  
</body>
</html>
