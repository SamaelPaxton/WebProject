<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/loginstyleadmin.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login">
	<h1>Login</h1>
	@if (Session::has ('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div> 
  @endif
  @if (Session::has ('fail'))
    <div class="alert alert-fail">{{Session::get('fail')}}</div> 
  @endif
  @if (Session::has ('restricted'))
    <div class="alert alert-fail">{{Session::get('restricted')}}</div> 
  @endif
    <form method="post" action="{{route('login-admin')}}">
		@csrf
		<div>
			<input type="text" name="adminUsername" placeholder="Enter your username here" required="required" value="{{old('adminUsername')}}" />
			<span class="text-danger">@error('adminUsername'){{$message}}@enderror</span>
		</div>
		<div>
			<input type="password" name="adminPassword" placeholder="Enter your password here" required="required" value="{{old('adminPassword')}}"/>
			<span class="text-danger">@error('adminPassword'){{$message}}@enderror</span>
		</div>
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
