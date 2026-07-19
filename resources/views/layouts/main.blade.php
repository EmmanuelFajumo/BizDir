<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="BizDir - Discover and connect with top local businesses. Find restaurants, hotels, services and more in your area.">
    <meta name="keywords" content="business directory, local businesses, find services, business listings">
    <meta name="author" content="BizDir">
    <meta property="og:title" content="BizDir - Your Local Business Directory">
    <meta property="og:description" content="Discover and connect with top local businesses in your area.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bizdir.com">
    <meta name="twitter:card" content="summary_large_image">
    <title>BizDir - Your Local Business Directory</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- Google Fonts: Poppins + Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
<body>

    <!-- 1. STICKY NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" id="mainNav" aria-label="Main navigation">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-building text-primary me-2"></i>BizDir
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route("login") }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Login</a>
                    <a href="{{ route("register") }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3 d-none d-md-inline-block">Register</a>
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-3">
                        <i class="bi bi-plus-lg me-1"></i>Post Business
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    @yield("hero")


    @yield("login form")
    @yield("register form")
    <!-- 3. POPULAR CATEGORIES -->
    @yield("categories")

    <!-- 4. FEATURED BUSINESSES -->
    @yield("featured")

    <!-- 5. WHY CHOOSE US -->
    @yield("why us")


    <!-- 8. TESTIMONIALS -->
    @yield("testimonials")



    <!-- 10. CTA BANNER -->
    <section class="section-padding cta-section bg-primary text-white position-relative overflow-hidden" aria-label="Call to action">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0" data-aos="fade-right">
                    <h2 class="display-6 fw-bold mb-3">Ready to Grow Your Business?</h2>
                    <p class="lead mb-0 opacity-90">Join thousands of successful businesses on BizDir and start reaching more customers today.</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end" data-aos="fade-left">
                    <a href="#" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold">
                        Get Started Now <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative circles -->
        <div class="position-absolute top-0 end-0 w-25 h-25 bg-white bg-opacity-10 rounded-circle translate-middle" aria-hidden="true"></div>
        <div class="position-absolute bottom-0 start-0 w-25 h-25 bg-white bg-opacity-10 rounded-circle translate-middle" aria-hidden="true"></div>
    </section>

    <!-- 11. LATEST BLOG POSTS -->
    <!--  -->
    @yield("blog")

    <!-- 12. NEWSLETTER -->
    @yield("newsletter")

    <!-- 13. FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-3" aria-label="Site footer">
        <div class="container">
            <div class="row g-4">
                <!-- Brand -->
                <div class="col-lg-4">
                    <a class="navbar-brand fw-bold fs-4 text-white mb-3 d-inline-block" href="#">
                        <i class="bi bi-building text-primary me-2"></i>BizDir
                    </a>
                    <p class="text-white-50 small mb-3">Your trusted local business directory. Discover, connect, and grow with thousands of businesses in your area.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">FAQ</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Categories</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Restaurants</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Hotels</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Hospitals</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Schools</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Real Estate</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Support</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Help Center</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Terms of Service</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Cookie Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Report Issue</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Contact</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2 text-white-50">
                            <i class="bi bi-geo-alt me-1"></i> 123 Business Ave, NY
                        </li>
                        <li class="mb-2">
                            <a href="mailto:info@bizdir.com" class="text-white-50 text-decoration-none hover-white">
                                <i class="bi bi-envelope me-1"></i> info@bizdir.com
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="tel:+1234567890" class="text-white-50 text-decoration-none hover-white">
                                <i class="bi bi-telephone me-1"></i> +1 (234) 567-890
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-white-10 my-4">

            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-white-50 mb-0">&copy; 2026 BizDir. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <p class="small text-white-50 mb-0">Made with <i class="bi bi-heart-fill text-danger"></i> for local businesses</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- BACK TO TOP BUTTON -->
    <button id="backToTop" class="btn btn-primary rounded-circle shadow-lg position-fixed" aria-label="Back to top" style="bottom: 30px; right: 30px; width: 50px; height: 50px; display: none; z-index: 1050;">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/home.js') }}"></script>

</body>
</html>
