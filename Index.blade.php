<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="JUAN DAVID VILLADIEGO DE LA ROSA">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="">
  <title>MediFlux</title>
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Enlances css -->
  <link rel="stylesheet" href="assets/pag1/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="assets/pag1/css/animate.css">
  <link rel="stylesheet" href="assets/pag1/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/pag1/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/pag1/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/pag1/css/aos.css">
  <link rel="stylesheet" href="assets/pag1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/pag1/css/flaticon.css">
  <link rel="stylesheet" href="assets/pag1/css/icomoon.css">
  <link rel="stylesheet" href="assets/pag1/css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">MediFlux</a>
      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav nav ml-auto">
          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Inicio</span></a></li>
          <li class="nav-item"><a href="#about-section" class="nav-link"><span>Medicamentos</span></a></li>
          <li class="nav-item"><a href="#department-section" class="nav-link"><span>Stock</span></a></li>
          <li class="nav-item"><a href="#doctor-section" class="nav-link"><span>Alertas</span></a></li>
          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Reportes</span></a></li>
          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contactos</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-wrap js-fullheight" style="background-image: url('assets/pag1/images/bg_3 mejorada_peso.jpg');" data-section="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-6 pt-5 ftco-animate">
          <div class="mt-5">
            <span class="subheading">bienvenido a Mediflux</span>
            <h1 class="mb-4">Cuidamos de su <br>salud con cada dosis</h1>
            <p class="mb-4">En el ámbito de la precisión y el control, gestionamos cada medicamento con dedicación, asegurando que la seguridad y la confianza se mantengan en cada paso del proceso. Nuestro enfoque asegura que su bienestar sea siempre nuestra prioridad en la gestión de almacenamiento.</p>
            <p><a href="{{ url('autenticación') }}" class="btn btn-primary py-3 px-4">EMPEZAR</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 col-lg-5 d-flex">
          <div class="img d-flex align-self-stretch align-items-center" style="background-image: url('assets/pag1/images/medicamento mejorada_peso.jpg');" loading="lazy">
          </div>
        </div>
        <div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
          <div class="py-md-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <h2 class="mb-4">Somos <span>MediFlux</span> <br> Un Sistema de Gestión de Medicamentos</h2>
                <p>Mediflux es un sistema donde la gestión de medicamentos se realiza de manera precisa y segura, en un entorno ideal que asegura que cada registro esté siempre actualizado y accesible cuando más lo necesitas.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="hero-wrap js-fullheight ftco-intro img" style="background-image: url('assets/pag1/images/stock mejorada_peso.jpg');" id="department-section">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 text-center">
          <h2>Mantén el flujo constante, asegura cada recurso.</h2>
          <p>Podemos gestionar con precisión el control de stock de medicamentos en tu sistema, asegurando que siempre dispongas de los insumos necesarios cuando más los necesitas.</p>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" style="background-image: url('assets/pag1/images/alertas mejorada_peso.jpg');" id="doctor-section" data-section="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-6 pt-5 ftco-animate">
          <div class="mt-5">
            <h1 class="mb-4">De manera puntual, salud sin caducar.</h1>
            <p class="mb-4">Podemos gestionar eficazmente las alertas de caducidad de los medicamentos en tu sistema, asegurando que todos los productos se utilicen dentro de su periodo de validez para mantener la seguridad y la efectividad en el tratamiento.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="hero-wrap js-fullheight ftco-intro img" style="background-image: url('assets/pag1/images/reportes mejorada_peso.jpg');" id="blog-section">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 text-center">
          <h2>Control óptimo de recursos con visión estratégica.</h2>
          <p>Garantizamos la disponibilidad continua con un sistema de reportes inteligente y preciso, asegurando que cada recurso esencial esté siempre al alcance en el momento exacto.</p>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section" id="contact-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2 class="mb-4">Contactos</h2>
          <p>Estamos aquí para ayudarte. Contáctanos para cualquier consulta o soporte</p>
        </div>
      </div>
      <div class="row d-flex contact-info mb-5">
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-map-signs"></span>
            </div>
            <h3 class="mb-4">DIRECCIÓN</h3>
            <p><a>Barrio el Deportivo Cl. 25 #32a-30 Arboletes - Antioquia</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-phone2"></span>
            </div>
            <h3 class="mb-4">Número de contacto</h3>
            <p><a href="tel://1234567920">3112105956</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-paper-plane"></span>
            </div>
            <h3 class="mb-4">Dirección de correo electrónico</h3>
            <p><a href="mailto:secretaria@esehpncarboletes-antioquia.gov.co">secretaria@esehpnc<br>arboletes-antioquia.gov.co</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-globe"></span>
            </div>
            <h3 class="mb-4">Sitio web</h3>
            <p><a href="http://www.esehpncarboletes-antioquia.gov.co" target="_blank">http://www.esehpnc<br>arboletes-antioquia.gov.co</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-section img" style="background-image: url(assets/pag1/images/footer-bg.jpg);">
    <div class="overlay"></div>
    <div class="container-fluid px-md-5">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">MediFlux</h2>
            <p>Detrás de cada lote de medicamentos, nos aseguramos de que todos los registros estén a salvo, lejos de cualquier error.</p>
            <ul class="ftco-footer-social list-unstyled mt-5">
              <li class="ftco-animate"><a href="https://www.facebook.com/HospitalPNC/" target="_blank"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/hospitalpnc/" target="_blank"><span class="icon-instagram"></span></a></li>
              <li class="ftco-animate"><a href="https://www.youtube.com/@hospitalpedronelcardona" target="_blank"><span class="icon-youtube"></span></a></li>
            </ul>
          </div>
        </div>

        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">
              <li><a href="#home-section"><span class="icon-long-arrow-right mr-2"></span>Inicio</a></li>
              <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>Medicamentos</a></li>
              <li><a href="#department-section"><span class="icon-long-arrow-right mr-2"></span>Stock</a></li>
              <li><a href="#doctor-section"><span class="icon-long-arrow-right mr-2"></span>Alertas</a></li>
              <li><a href="#blog-section"><span class="icon-long-arrow-right mr-2"></span>Reportes</a></li>
              <li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contactos</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">¿Tiene alguna pregunta?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><a href="#"><span class="icon icon-map-marker"></span><span class="text">Barrio el Deportivo Cl. 25 #32a-30 Arboletes - Antioquia</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">3112105956</span></a></li>
                <li><a href="mailto:secretaria@esehpncarboletes-antioquia.gov.co"><span class="icon icon-envelope pr-4"></span><span class="text">secretaria@esehpncarboletes-antioquia.gov.co</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 text-center">
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved
        </div>
      </div>
    </div>
  </footer>

  <script>
    window.addEventListener('load', function() {
      console.log("Página completamente cargada");
      document.body.classList.add('loaded');
    });
  </script>

  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>

  <script src="assets/pag1/js/jquery.min.js"></script>
  <script src="assets/pag1/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/pag1/js/popper.min.js"></script>
  <script src="assets/pag1/js/bootstrap.min.js"></script>
  <script src="assets/pag1/js/jquery.easing.1.3.js"></script>
  <script src="assets/pag1/js/jquery.waypoints.min.js"></script>
  <script src="assets/pag1/js/jquery.stellar.min.js"></script>
  <script src="assets/pag1/js/owl.carousel.min.js"></script>
  <script src="assets/pag1/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/pag1/js/aos.js"></script>
  <script src="assets/pag1/js/jquery.animateNumber.min.js"></script>
  <script src="assets/pag1/js/scrollax.min.js"></script>
  <script src="assets/pag1/js/google-map.js"></script>

  <script src="assets/pag1/js/main.js"></script>

  <script>
    // Si se carga desde el historial del navegador (por ejemplo, al presionar el botón "Atrás"), recargar la página
    window.addEventListener("pageshow", function(event) {
      var isHistoryNavigation = event.persisted || (window.performance && window.performance.navigation.type === 2);
      if (isHistoryNavigation) {
        window.location.reload();
      }
    });
  </script>


</body>

</html>