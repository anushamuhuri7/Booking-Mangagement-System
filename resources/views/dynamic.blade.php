@extends('layout.baseview')
@section('title','Login')
@section('style')
<style>
 .navbar-brand img {
  width: 60px;
}
.navbar-nav {
  align-items: center;
}
.navbar .navbar-nav .nav-link {
  
  font-size: 1.1em;
  padding: 0.5em 1em;
}
@media screen and (min-width: 768px) {
  .navbar-brand img {
    width: 80px;
  }
  .navbar-brand {
    margin-right: 0;
    padding: 0 1em;
  }
}
</style>
@endsection
@section('content')
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                    <div class="navbar-nav mx-auto align-items-center">
                        <a href="{{url('/')}}" class="nav-item nav-link active pe-3">Home</a>
                        <a href="{{url('/#team')}}" class="nav-item nav-link text-black pe-3">Team</a>
                        <a class="navbar-brand mx-4" href="{{url('/')}}">
                            <img src="{{asset('assets/images/logo.png')}}" height="60" alt="AMBook Logo">
                        </a>
                        <a href="{{url('/#about-us')}}" class="nav-item nav-link text-black ps-3">About Us</a>
                        <a href="{{url('/#contact')}}" class="nav-item nav-link text-black ps-3">Contact Us</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-4">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="m-5">
        {!! isset($data->html)?$data->html : 'Page Not Found' !!}
    </main>
    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container m-5">
                        <img src="assets/logo.png" height="30px" class="bg-white">
                        <div>
                            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nulla maxime, at culpa ipsa aliquam exercitationem deserunt odit incidunt a neque voluptas suscipit maiores quae dolor dolore tenetur corrupti dolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container m-5">
                        <p class="text-white fs-5">Quick Links</p>
                        <ul class="remove-bullets remove-text-decoration">
                            <li><a  href="#" class="remove-text-decoration text-white">About Us</a></li>
                            <li><a href="#" class="remove-text-decoration text-white">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-white text-center">
                    <p>All rights reserved &copy; 2026, <strong>AMBook</strong>. Designed by Anusha Muhuri.</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
@section('customjs')
<script>
</script>
@endsection