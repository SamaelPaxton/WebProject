<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
   <link rel="apple-touch-icon" href="imgages/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="css/home/bootstrap.min.css">
    <link rel="stylesheet" href="css/home/templatemo.css">
    <link rel="stylesheet" href="css/home/custom.css">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/home/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   <title>Search</title>
</head>
<body>
   <!-- Header -->
   <nav class="navbar navbar-expand-lg navbar-light shadow">
      <div class="container d-flex justify-content-between align-items-center">

          <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
              LAPTOP
          </a>

          <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
              <div class="flex-fill">
                  <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('/')}}">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="">About</a>
                      </li>
                      @if (Session::has('loginID'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('editCustomer')}}">Welcome: {{Session::get('loginName')}}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('logout')}}">Logout</a>
                      </li>
                      @else
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('register')}}">Register</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('login')}}">Login</a>
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
                  <a class="nav-icon d-none d-lg-inline" href="{{url('search')}}" data-bs-toggle="modal" data-bs-target="#templatemo_search">
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
  <!-- Close Header -->
   <div class="container">
      <div class="row">
         <div class="col-md-6" style="margin-top: 40px">
            <h4>Search</h4><hr>
            <form action="{{route('web.search')}}" method="GET">
               <div class="form-group">
                  <label for="query">Enter keyword</label>
                  <input type="text" name="query" placeholder="Search here" class="form-control" value="{{ request()->input('query') }}">
                  <span class="text-danger">@error('query'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Search</button>
               </div>
            </form>
            <br>
            <br>
            <br>
            <br>
            @if (isset($products))
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Detail</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if (count($products)>0)
                        @foreach ($products as $product)
                           <tr>
                              <td>{{$product->productName}}</td>
                              <td>{{$product->productPrice}}</td>
                              <td><img src="images/{{$product->productImage1}}"></td>
                              <td>{{$product->productDetails}}</td>
                           </tr>
                        @endforeach
                     @else
                        <tr><td>No result found!</td></tr>
                     @endif
                  </tbody>
               </table>

               <div class="pagination-block">
                  {{$products->appends(request()->input())->links('0905C.Layout.paginationlink')}}
               </div>
            @endif
         </div>
      </div>
   </div>
</body>
</html>