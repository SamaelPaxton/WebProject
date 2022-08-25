<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Shopping Cart</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cart.css">
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
  <link href='' rel='stylesheet'>
  <link rel="stylesheet" href="css/home/bootstrap.min.css">
  <link rel="stylesheet" href="css/home/templatemo.css">
  <link rel="stylesheet" href="css/home/custom.css">

    
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="css/home/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
<!-- partial:index.partial.html -->
@if (Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{Session::get('success')}}
  </div>                    
@endif

<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: white">
  <div class="container d-flex justify-content-between align-items-center">

      <a class="navbar-brand text-success logo h1 align-self-center" href="{{url('products')}}">
          LAPTOP
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
          <div class="flex-fill">
              <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/')}}" style="color: black">Home</a>
                  </li>
                  <li class="nav-item" >
                      <a class="nav-link" href="" style="color: black">About</a>
                  </li>
                  @if (Session::has('loginID'))
                  <li class="nav-item" >
                      <a class="nav-link" style="color: black" href="{{url('profile')}}">Welcome: {{Session::get('loginName')}}</a>
                  </li>
                  <li class="nav-item" >
                      <a class="nav-link" href="{{url('logout')}}" style="color: black">Logout</a>
                  </li>
                  @else
                  <li class="nav-item" >
                      <a class="nav-link" href="{{url('register')}}" style="color: black">Register</a>
                  </li>
                  <li class="nav-item" >
                      <a class="nav-link" href="{{url('login')}}" style="color: black">Login</a>
                  </li>
                  
                  @endif
              
              </ul>
          </div>
          <div class="navbar align-self-center d-flex">
              <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                  <div class="input-group">
                      <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                      <div class="input-group-text">
                          <i class="fa fa-fw fa-search"></i>
                      </div>
                  </div>
              </div>
              <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                  <i class="fa fa-fw fa-search text-dark mr-2"></i>
              </a>
              <a class="nav-icon position-relative text-decoration-none" href="{{url('cart')}}">
                  <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                  <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
              </a>
          </div>
      </div>

  </div>
</nav>
<br><br>
<div class="shopping-cart">
  <span><a href="{{url('products')}}" class="btn btn-success">Back</a></span>
  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
  @php
    $final = 0; $id=0;
  @endphp
@foreach ($data as $rows )
  {{$id = $rows->cartID}}
  <div class="product">
      <div class="product-image">
        <img src="images/{{$rows->productImage1}}">
      </div>
      <a href="{{url('quantityEdit/'.$rows->itemOrder)}}">
        <div class="product-details">
          <div class="product-title">{{$rows->productName}}</div>
          <p class="product-description">{{$rows->productDetails}}</p>
        </div>
      </a>
      @php
        $final +=  $rows->productAmount * $rows->productPrice;
      @endphp
    <div class="product-price">{{$rows->productPrice}}.000đ</div>
    <div class="product-quantity">
      <input type="number" value="{{$rows->productAmount}}" min="1">
    </div>
    <div class="product-removal">
      <a href="{{url('removeItem/'.$rows->itemOrder)}}"><button class="remove-product" type="submit">Remove</button></a>
    </div>
    <div class="product-line-price">{{$total = $rows->productPrice * $rows->productAmount}}.000đ</div>
  </div>
  
@endforeach
<div class="totals">
  <div class="totals-item totals-item-total">
    <label>Grand Total</label>
    <div class="totals-value" id="cart-total">{{$final}}.000đ</div>
  </div>
</div>
<a href="{{url('receipt/'.$id.'/'.$final)}}">
  <button class="checkout">Proceed to checkout</button>
</a>
@if (Session::has('noitem'))
<span class="alert alert-danger" role="alert">
    {{Session::get('noitem')}}
</span>
@endif
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>

</body>
</html>
