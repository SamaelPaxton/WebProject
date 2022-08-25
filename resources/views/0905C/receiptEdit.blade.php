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
    @php
        $mytime = Carbon\Carbon::now();
    @endphp
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Receipt</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('duplicate'))
                    <div class="alert alert-danger">{{session::get('duplicate')}}</div>
                @endif
                <form action="{{url('receiptupdate/'.$data->cartID)}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="email">Delivery instruction</label>
                        <input type="text" name="deliveryInstruction" class="form-control" value="{{$data->deliveryInstruction}}">
                        <span class="text-danger">@error('deliveryInstruction'){{$message}}@enderror</span>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Delivery address</label>
                        <input type="text" name="deliveryAddress" class="form-control" value="{{$data->deliveryAddress}}">
                        <span class="text-danger">@error('deliveryAddress'){{$message}}@enderror</span>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Purchase time and date</label>
                        <input type="text" name="datetime" class="form-control" value="{{$mytime}}" readonly>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{url('cart')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>