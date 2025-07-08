<?php
include 'config.php';
$query = new Database();
$services = $query->select('services');
$bioservices = $query->select('bioServices');
$ourservices = $query->select('ourServices');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Services</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="services-page">

  <?php include 'includes/header.php'; ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="./">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
        <h1>Services</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $bioservices[0]['h2'] ?></h2>
        <p><?php echo $bioservices[0]['p1'] ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center">
           

<style>
  @keyframes liquidZoomBurst {
    0% {
      transform: scale(0.8);
      border-radius: 70% 30% 60% 40%/60% 50% 50% 40%;
      clip-path: polygon(0 20%, 100% 0%, 100% 30%, 0 50%);
    }
    30% {
      transform: scale(1.1);
      border-radius: 40% 60% 40% 60%/50% 50% 50% 50%;
      clip-path: polygon(0 0%, 100% 10%, 100% 90%, 0 100%);
    }
    60% {
      transform: scale(1.05);
      border-radius: 30% 70% 30% 70%/40% 60% 40% 60%;
      clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0 100%);
    }
    100% {
      transform: scale(1);
      border-radius: 0;
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
    }
  }
</style>

<img src="assets/img/<?php echo $bioservices[0]['image'] ?>" 
     class="img-fluid" 
     alt="Our Products"
     style="
       animation: liquidZoomBurst 7s cubic-bezier(0.4, 0, 0.2, 1.5) infinite;
       transform-origin: center center;
       will-change: transform, clip-path;
       filter: none;
       box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
     ">

















          </div>

          <div class="col-lg-6 pt-4 pt-lg-0 content">

            <h3><?php echo $bioservices[0]['h3'] ?></h3>
            <p class="fst-italic">
              <?php echo $bioservices[0]['p2'] ?>
            </p>

            <div class="skills-content skills-animation">

              <?php foreach ($ourservices as $service): ?>
                <div class="progress">
                  <span class="skill"><span><?php echo $service['service_name']; ?></span> <i class="val"><?php echo $service['skill_level']; ?>%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $service['skill_level']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><!-- End Skills Item -->
              <?php endforeach; ?>

            </div>

          </div>
        </div>

      </div>

    </section>

    <!-- Services Section -->
    <section id="services" class="services section">
      <div class="container">
        <div class="row gy-4">
          <?php foreach ($services as $service): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($service['id'] - 1) * 100; ?>">
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="<?= htmlspecialchars($service['icon']) ?>"></i>
                </div>
                
                  <h3><?= htmlspecialchars($service['title']) ?></h3>
                </a>
                <p><?= htmlspecialchars($service['description']) ?></p>
              </div>
            </div><!-- End Service Item -->
          <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End Services Section -->

  </main>

  <?php include 'includes/footer.php'; ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>


<!-- WhatsApp Floating Button -->
<a href="https://wa.me/254748900043"
   class="whatsapp-float animate-bounce"
   target="_blank"
   title="Chat with us on WhatsApp">
  <i class="bi bi-whatsapp"></i>
</a>

<!-- Phone Floating Button -->
<a href="tel:+254748900043"
   class="phone-float animate-ring"
   title="Call Us">
  <i class="bi bi-telephone-fill"></i>
</a>

<!-- Email Floating Button -->
<a href="mailto:info@birmannict.com"
   class="email-float animate-pulse"
   title="Email Us">
  <i class="bi bi-envelope-fill"></i>
</a>


</body>

</html>