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
                <h2>Add new product</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('save')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="id">ID</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter product id">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="name">Product name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="price">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter product price">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="detail">Detail</label>
                        <textarea name="detail" rows="5" placeholder="Enter product datail" class="form-control"></textarea>  
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="producer">Producer</label>
                        {{-- <input type="number" name="producer" class="form-control"> --}}
                        <select name="producer" class="form-control">
                            @foreach ($producers as $row)
                                <option value="{{$row->producerID}}">{{$row->producerName}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('admindashboard.product.list2')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>