<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add new</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Add new admin</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('save2')}}" method="POST">
                    @csrf

                    <div class="md-3">
                        <label class="form-label" for="name">Admin name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter admin name">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="password">Admin password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter admin password">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
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