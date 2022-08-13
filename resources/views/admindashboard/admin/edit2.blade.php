<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit admin</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('update2')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="id">ID</label>
                        <input type="text" name="id" class="form-control" value="{{$admindata->adminID}}" readonly>
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="name">Admin name</label>
                        <input type="text" name="name" class="form-control" value="{{$admindata->adminUsername}}">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="price">Admin Email</label>
                        <input type="text" name="price" class="form-control" value="{{$admindata->adminEmail}}">
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('admindashboard.admin.list')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>