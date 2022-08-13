<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>New Product</title>
  </head>
  <body>
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Add a new product</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>                    
                @endif
                <form action="{{url('save')}}" method="POST">
                    @csrf
                        <div class="md-3">
                            <label class="form-label" for="id">ID</label>
                            <input type="text" name="id" class="form-control" placeholder="Enter the ID of product">
                        </div>
                        <div class="md-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter the name of product">
                        </div>
                        <div class="md-3">
                            <label class="form-label" for="id">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter the price of product">
                        </div>
                        <div class="md-3">
                            <label class="form-label" for="details">Details</label>
                            <textarea name="details" cols="30" rows="5" placeholder="Enter the details of product" class="form-control"></textarea>
                        </div>
                        <div class="md-3">
                            <label class="form-label" for="image1">Image1</label>
                            <input type="file" name="image1" class="form-control">
                        </div>
                        <div class="md-3">
                            <label class="form-label" for="producer">Producer ID</label>
                            <select name="producer" class="form-control">
                            @foreach ($producers as $row)
                                <option value="{{$row->producerID}}">{{$row->producerName}}</option>
                            @endforeach
                           </select>
                            {{-- <input type="text" name="producer" class="form-control" placeholder="Enter the ID of producer"> --}}
                        </div> <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{url('list')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>