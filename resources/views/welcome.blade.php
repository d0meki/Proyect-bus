<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>El Dorado SRL</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top" class="landing-page no-skin-config">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="index.html">EL DORADO SRL</a>
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                            @auth
                                <li><a class="nav-link page-scroll" href="{{ route('home') }}">Home</a></li>
                            @else
                                <li><a class="nav-link page-scroll" href="{{ route('login') }}">login</a></li>
                            @endauth
                        @endif
                        <li><a class="nav-link page-scroll" href="#features">Mision</a></li>
                        <li><a class="nav-link page-scroll" href="#team">Equipo</a></li>
                        <li><a class="nav-link page-scroll" href="#testimonials">Tetimonios</a></li>
                        <li><a class="nav-link page-scroll" href="#pricing">Precios</a></li>
                        <li><a class="nav-link page-scroll" href="#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="inSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#inSlider" data-slide-to="0" class="active"></li>
            <li data-target="#inSlider" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>El Dorado SRL<br />
                            Piérdete en el mundo<br />

                        </h1>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>Viajar no es llegar a destinos, es descubrirnos en la ruta.</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="#" role="button">LEER MAS</a>
                        </p>
                    </div>

                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one"></div>

            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption blank">
                        <h1>El viajar sólo es glamoroso <br /> cuando se lo mira en retrospectiva.</h1>
                        <p>Viajar no es llegar a un lugar, es abrir un camino</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">LEER MAS</a></p>
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back two"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <section id="team" class="gray-section team">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Our Team</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 wow fadeInLeft">
                    <div class="team-member">
                        <img src="img/landing/avatar3.jpg" class="img-fluid rounded-circle img-small" alt="">
                        <h4><span class="navy">Amelia</span> Smith</h4>
                        <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam
                            an soluta sensibus. </p>
                        <ul class="list-inline social-icon">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member wow zoomIn">
                        <img src="img/landing/avatar1.jpg" class="img-fluid rounded-circle" alt="">
                        <h4><span class="navy">John</span> Novak</h4>
                        <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam
                            an soluta sensibus.</p>
                        <ul class="list-inline social-icon">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 wow fadeInRight">
                    <div class="team-member">
                        <img src="img/landing/avatar2.jpg" class="img-fluid rounded-circle img-small" alt="">
                        <h4><span class="navy">Peter</span> Johnson</h4>
                        <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam
                            an soluta sensibus.</p>
                        <ul class="list-inline social-icon">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center m-t-lg m-b-lg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos
                        non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>



    <section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center wow zoomIn">
                    <i class="fa fa-comment big-icon"></i>
                    <h1>
                        What our users say
                    </h1>
                    <div class="testimonials-text">
                        <i>"Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                            model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on
                            purpose (injected humour and the like)."</i>
                    </div>
                    <small>
                        <strong>12.02.2024 - Andy Smith</strong>
                    </small>
                </div>
            </div>
        </div>

    </section>



    <section id="contact" class="gray-section contact">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Contactanos</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
            <div class="row m-b-lg justify-content-center">
                <div class="col-lg-3 ">
                    <address>
                        <strong><span class="navy">El Dorado SRL, Inc.</span></strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-lg-4">
                    <p class="text-color">
                        Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad
                        perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad
                        perspiciatis, totam corporis ea,
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="mailto:test@email.com" class="btn btn-primary">Envianos un correo</a>
                    <p class="m-t-sm">
                        O visitanos en nuestras redes sociales
                    </p>
                    <ul class="list-inline social-icon">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center m-t-lg m-b-lg">
                    <p><strong>&copy; {{ Date('Y') }} El Dorado SRL</strong><br /> consectetur adipisicing elit. Aut
                        eaque,
                        laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/wow/wow.min.js"></script>


    <script>
        $(document).ready(function() {

            $('body').scrollspy({
                target: '#navbar',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;

            function init() {
                window.addEventListener('scroll', function(event) {
                    if (!didScroll) {
                        didScroll = true;
                        setTimeout(scrollPage, 250);
                    }
                }, false);
            }

            function scrollPage() {
                var sy = scrollY();
                if (sy >= changeHeaderOn) {
                    $(header).addClass('navbar-scroll')
                } else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }

            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();
    </script>

</body>

</html>
