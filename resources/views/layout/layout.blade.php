<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SKMA Conference</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/assets//assets/images/favicon.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/simple-line-icons.css" type="text/css" media="all">
    @vite('resources/scss/style.scss')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- preloader -->
<div id="preloader">
    <div class="book">
        <div class="inner">
            <div class="left"></div>
            <div class="middle"></div>
            <div class="right"></div>
        </div>
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>

<!-- site wrapper -->
<div class="site-wrapper">

    <div class="main-overlay"></div>
    <header class="header-default">
        <nav class="navbar navbar-expand-lg">
            <div class="container-xl">
                <!-- site logo -->
                <a class="navbar-brand" href="/"><img src="/assets/icons/logo.svg" alt="logo" style="width: 150px;" /></a>

                <div class="collapse navbar-collapse">
                    <!-- menus -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">О конференции</a>
                        </li>
                    </ul>
                </div>

                <!-- header right section -->
                <div class="header-right">
                    <!-- social icons -->
                    <ul class="social-icons list-unstyled list-inline mb-0">
                        <li class="list-inline-item"><a href="https://www.facebook.com/ukma.kz" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/medacadem_skma/"
                                                        target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.youtube.com/@skma-edu-kz" target="_blank"><i
                                    class="fab fa-youtube"></i></a></li>
                    </ul>
                    <!-- header buttons -->
                    <div class="header-buttons">
                        <button class="search icon-button">
                            <i class="icon-magnifier"></i>
                        </button>
                        <button class="burger-menu icon-button">
                            <span class="burger-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <!-- footer -->
    <footer>
        <div class="container-xl">
            <div class="footer-inner">
                <div class="row d-flex align-items-center gy-4">
                    <!-- copyright text -->
                    <div class="col-md-4">
                        <span class="copyright">© 2024 SKMA Conference</span>
                    </div>

                    <!-- social icons -->
                    <div class="col-md-4 text-center">
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>

                    <!-- go to top button -->
                    <div class="col-md-4">
                        <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Вернуться наверх</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>
    <!-- content -->
    <div class="search-content">
        <div class="text-center">
            <h3 class="mb-4 mt-0">Press ESC to close</h3>
        </div>
        <!-- form -->
        <form class="d-flex search-form">
            <input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
            <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
        </form>
    </div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>

    <!-- logo -->
    <div class="logo">
        <img src="/assets/images/logo.svg" alt="Katen"/>
    </div>

    <!-- menu -->
    <nav>
        <ul class="vertical-menu">
            <li class="active">
                <a href="index.html">Home</a>
                <ul class="submenu">
                    <li><a href="index.html">Magazine</a></li>
                    <li><a href="personal.html">Personal</a></li>
                    <li><a href="personal-alt.html">Personal Alt</a></li>
                    <li><a href="minimal.html">Minimal</a></li>
                    <li><a href="classic.html">Classic</a></li>
                </ul>
            </li>
            <li><a href="category.html">Lifestyle</a></li>
            <li><a href="category.html">Inspiration</a></li>
            <li>
                <a href="#">Pages</a>
                <ul class="submenu">
                    <li><a href="category.html">Category</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                    <li><a href="blog-single-alt.html">Blog Single Alt</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>

    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item"><a href="https://www.facebook.com/ukma.kz" target="_blank"><i
                    class="fab fa-facebook-f"></i></a></li>
        <li class="list-inline-item"><a href="https://www.instagram.com/medacadem_skma/"
                                        target="_blank"><i class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="https://www.youtube.com/@skma-edu-kz" target="_blank"><i
                    class="fab fa-youtube"></i></a></li>
    </ul>
</div>

<!-- JAVA SCRIPTS -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/jquery.sticky-sidebar.min.js"></script>
<script src="/assets/js/custom.js"></script>

</body>
</html>
