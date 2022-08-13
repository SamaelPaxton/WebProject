<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - GoSNippets</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link rel="stylesheet" href="css/home/bootstrap.min.css">
    <link rel="stylesheet" href="css/home/templatemo.css">
    <link rel="stylesheet" href="css/home/custom.css">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/home/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body {
    font-family: 'Roboto Condensed', sans-serif;
    background-image: url('../images/bgSingleProduct.jpg');
    background-repeat: no-repeat;
}
a.button,
button {
    ...
    box-sizing: content-box;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
}

.hedding {
    font-size: 20px;
    color: #ab8181`;
}

.main-section {
    position: relative;
    left: 50%;
    right: 50%;
    top: 50%;
    transform: translate(-50%, 5%);
    background-color: transparent;
}

.left-side-product-box img {
    width: 100%;
}

.left-side-product-box .sub-img img {
    margin-top: 5px;
    width: 83px;
    height: 100px;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}</style>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: black">
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
                            <a class="nav-link" href="{{url('/')}}" style="color: white">Home</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="" style="color: white">About</a>
                        </li>
                        @if (Session::has('loginID'))
                        <li class="nav-item" >
                            <a class="nav-link" style="color: white" href="{{url('profile')}}">Welcome: {{Session::get('loginName')}}</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="{{url('logout')}}" style="color: white">Logout</a>
                        </li>
                        @else
                        <li class="nav-item" >
                            <a class="nav-link" href="{{url('register')}}" style="color: white">Register</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="{{url('login')}}" style="color: white">Login</a>
                        </li>
                        
                        @endif
                    
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    
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
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
         {{Session::get('success')}}
        </div>                    
    @endif
    <div class="col-lg-8 border p-3 main-section bg-white">
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img src="../images/{{$data->productImage1}}" class="border p-3">
                <span class="sub-img"></span>
            </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="m-0 p-0">{{$data->productName}}</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">{{$data->productPrice}}.000đ</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>{{$data->productDetails}}</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Tag : </strong><a href="">Laptop</a></p>
                        </div>
                        <form method="POST" action="{{url('addToCart/'.$data->productID)}}">
                            @csrf
                            <div class="col-lg-12">
                                <h6>Quantity :</h6>
                                <input type="number" class="form-control text-center w-100" name="quantity" value="1">
                                <span class="text-danger">@error('quantity'){{$message}}@enderror</span>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2" style="margin: auto">
                                        <button type="submit" class="btn btn-warning w-100">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="container">
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2">
                                        <a href="{{url('products')}}"><button class="btn btn-success w-100">Return</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'></script>
</body>
</html>