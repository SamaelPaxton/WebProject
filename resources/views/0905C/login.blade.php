<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/loginstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Login</title>
	<style>
		body{
			background: linear-gradient(to right, #c495cc, #e493f3);
		}
	</style>
<body>
<div class="container">
	<div class="main">
		<p class="sign" align="center" >Sign in</p>
		@if (Session::has ('success'))
			<div class="alert alert-success" style="color: black" align="center">{{Session::get('success')}}</div> 
		@endif
		@if (Session::has ('fail'))
			<div class="alert alert-fail" style="color: black" align="center">{{Session::get('fail')}}</div> 
		@endif
		@if (Session::has ('restricted'))
			<div class="alert alert-fail" style="color: black" align="center">{{Session::get('restricted')}}</div> 
		@endif
		<form class="form1" method="POST" action="{{route('login-user')}}">
			@csrf
			<input class="un " type="text"  placeholder="Username" name="customerUsername" required="required" value="{{old('customerUsername')}}" >
			<span class="text-danger">@error('customerUsername'){{$message}}@enderror</span>
			<input class="pass" type="password"  placeholder="Password" name="customerPassword" required="required" value="{{old('customerPassword')}}">
			<span class="text-danger">@error('customerPassword'){{$message}}@enderror</span>
			<button class="submit" type="submit">Log in</button>
			
			<p class="" align="center">Don't have an account?<a href="{{url('register')}}"> Register here</a>.</p>
		</form>
	</div>
</div>
     
</body>

</html>