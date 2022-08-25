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
                <h2>Receipt</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                    <div class="md-3">
                        <label class="form-label" for="name">Customer name</label>
                        <input type="text" name="name" class="form-control" value="{{$data->customerUsername}}" readonly>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{$data->customerPhone}}" readonly>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Total</label>
                        <input type="text" name="phone" class="form-control" value="{{$total}}.000đ" readonly>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Payment method</label>
                        <input type="text" name="phone" class="form-control" value="{{$data->paymentMethod}}" readonly>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Delivery instruction</label>
                        <input type="text" name="phone" class="form-control" value="{{$data->deliveryInstruction}}" readonly>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Delivery address</label>
                        <input type="text" name="phone" class="form-control" value="{{$data->deliveryAddress}}" readonly>
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="email">Purchase time and date</label>
                        <input type="text" name="phone" class="form-control" value="{{$data->datetime}}" readonly>
                    </div>
                    <br>
                    <a href="{{url('receiptedit/'.$data->cartID)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('cart')}}" class="btn btn-success">Back</a>
                    
                </form>
            </div>
        </div>
    </div>
  </body>
</html>