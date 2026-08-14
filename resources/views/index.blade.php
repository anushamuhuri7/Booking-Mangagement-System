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
                        <a href="#team" class="nav-item nav-link text-black pe-3">Team</a>
                        <a class="navbar-brand mx-4" href="{{url('/')}}">
                            <img src="{{asset('assets/images/logo.png')}}" height="60" alt="AMBook Logo">
                        </a>
                        <a href="#about-us" class="nav-item nav-link text-black ps-3">About Us</a>
                        <a href="#contact" class="nav-item nav-link text-black ps-3">Contact Us</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-4">Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" ></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" ></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://dummyimage.com/600x400/000/fff" class="d-block w-100" alt="Carousel 1" style="max-height: 100vh;">
                </div>
                <div class="carousel-item">
                    <img src="https://dummyimage.com/600x400/000/fff" class="d-block w-100" alt="Carousel 2" style="max-height: 100vh;">
                </div>
                <div class="carousel-item">
                    <img src="https://dummyimage.com/600x400/000/fff" class="d-block w-100" alt="Carousel 3" style="max-height: 100vh;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </header>
    <main class="m-5">
        <section class="container m-4" id="about-us">
            <h6 class="display-5 text-center">About Us</h6>
            <div class="row">
                <div class="col-md-5">
                    <div class="container">
                        <img src="{{asset('assets/images/about_us.png')}}" class="d-block w-100 rounded shadow" alt="About AMBook Illustration">
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="text-black-50">
                        Welcome to <strong>AMBook</strong>, a state-of-the-art Booking Management System designed to simplify your scheduling and reservation needs.
                    </p>
                    <p>
                        Designed with precision by <strong>Anusha Muhuri</strong>, AMBook offers a seamless experience for both administrators and clients. Whether you're managing complex appointment schedules or looking for a straightforward way to book services, our system provides the tools necessary to keep everything organized and efficient.
                    </p>
                </div>
            </div>
            <div class="row">
                <h6 class="display-6 text-center">What Makes us Unique</h6>
                <div class="col-md-4">
                    <div class="container text-center">
                        <span class="bi bi-person color-teal icon-lg"></span>
                        <p>Custom Tailored user Options</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center">
                        <span class="bi bi-shield-shaded color-teal icon-lg"></span>
                        <p>Privary First Approach</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center">
                        <span class="bi bi-list color-teal icon-lg"></span>
                        <p>Multiple Variations</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="team" class="container m-4">
            <h6 class="display-5 text-center">Our Innovative Team</h6>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="card shadow-sm border-0" style="width: 300px;">
                            <img class="card-img-top p-4" src="{{asset('assets/images/avatar1.png')}}" alt="Alex Rivers">
                            <div class="card-body text-center">
                                <h4 class="card-title">Alex Rivers</h4>
                                <p class="card-text text-muted">Directing the vision and growth of AMBook with industry-leading expertise.</p>
                                <div class="mt-3">
                                    <i class="bi bi-facebook mx-2"></i>
                                    <i class="bi bi-twitter mx-2"></i>
                                    <i class="bi bi-linkedin mx-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="card shadow-sm border-0" style="width: 300px;">
                            <img class="card-img-top p-4" src="{{asset('assets/images/avatar2.png')}}" alt="Sarah J.">
                            <div class="card-body text-center">
                                <h4 class="card-title">Sarah Jenkins</h4>
                                <p class="card-text text-muted">Our lead designer ensuring a pixel-perfect and user-friendly experience for all.</p>
                                <div class="mt-3">
                                    <i class="bi bi-facebook mx-2"></i>
                                    <i class="bi bi-twitter mx-2"></i>
                                    <i class="bi bi-linkedin mx-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="card shadow-sm border-0" style="width: 300px;">
                            <img class="card-img-top p-4" src="{{asset('assets/images/avatar3.png')}}" alt="Marcus T.">
                            <div class="card-body text-center">
                                <h4 class="card-title">Marcus Thorne</h4>
                                <p class="card-text text-muted">Mastering the back-end architecture to keep our systems fast and reliable.</p>
                                <div class="mt-3">
                                    <i class="bi bi-facebook mx-2"></i>
                                    <i class="bi bi-twitter mx-2"></i>
                                    <i class="bi bi-linkedin mx-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="container m-4">
            <h6 class="display-5 text-center ">Contact Us</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="container p-3">
                        <p class="text-muted text-center fs-3">Here's our Contact Info</p>
                        <div class="text-black-s text-center fs-4">Our Email</div>
                        <div class="text-black-50 text-center fs-5">contact@ambook.com</div>
                        <div class="text-black-s text-center fs-4">Our Phone No.</div>
                        <div class="text-black-50 text-center fs-5">+91 98765 43210</div>
                        <div class="text-black-s text-center fs-4">Our Address</div>
                        <div class="text-black-50 text-center fs-5">456 Random Avenue, Block-D <br> Cityville, ST 54321</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <p class="text-muted text-center fs-3">You can also Write to Us</p>
                        <div class="container p-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Enter Your Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailid" class="form-label">Enter Your Email</label>
                                            <input type="email" class="form-control" name="email" id="emailid">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="form-label">Enter the subject</label>
                                            <input type="text" class="form-control" name="subject" id="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="message" class="form-label">Enter Your Message</label>
                                            <textarea class="form-control" name="message" id="message"></textarea>
                                        </div>
                                        <div class="form-group text-center">                                               
                                            <input type="submit" class="btn btn-outline-dark" value="Send Message">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                            <li><a href="#" class="remove-text-decoration text-white">Contact Us</a></li>C
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