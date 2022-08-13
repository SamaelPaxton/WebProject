<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit quantity</title>
  </head>
  <body>
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit product quantity</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>                    
                @endif
                <form action="{{url('quantityUpdate')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="id">Order ID</label>
                        <input type="number" class="form-control" value="{{$data->itemOrder}}" readonly name="itemOrder">
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="id">Item name</label>
                        <input type="text" class="form-control" value="{{$data->productName}}" readonly name="name">
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="id">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{$data->productAmount}}">
                        <span class="text-danger">@error('quantity'){{$message}}@enderror</span>
                    </div> <br>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{url('cart')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>