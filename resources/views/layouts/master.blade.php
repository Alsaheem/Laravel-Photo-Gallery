<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('assets/fontawesome/js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>@yield('title','Home')</title>
</head>
<body>
@include('inc.navbar')
<div class="container mt-4">


    <div class="row">
        <div class="col-md-12 col-lg-12">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

</div>



<footer id="footer" class="text-center mt-3">
    <p>Alsaheem With Copyright &copy <i class="fas fa-heart text-danger"></i> 2019 </p>
</footer>


</body>

<script src="{{ asset('assets/script.js') }}"></script>
<script src="{{ asset('assets/jquery.js') }}"></script>
<script src="{{ asset('assets/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.min.js') }}"></script>
</html>
