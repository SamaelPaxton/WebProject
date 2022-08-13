<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>cla</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- link for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profile of user</title>
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>User profile</h2>
                <form action="{{url('update3')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="id">ID</label>
                        <input type="text" name="id" class="form-control" value="{{$userdata->customerID}}" readonly>
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="name">Customer name</label>
                        <input type="text" name="name" class="form-control" value="{{$userdata->customerUsername}}" readonly>
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="phone">Customer Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{$userdata->customerPhone}}" readonly>
                    </div>
                    <br>
                    
                    <a href="{{url('profileedit/'.$userdata->customerID)}}" class="btn btn-success">Edit</a>
                    <a href="{{url('/')}}" class="btn btn-success">Back</a>
                    <a href="{{url('deleteProfile/'. $userdata->customerID)}}" class="btn btn-danger"
                    onclick="return confirm ('Are you sure!');">Delete</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>