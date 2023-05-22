<?php require 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Supreme Student Government of JBI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url ?>assets/files/images/system/ssg.png" rel="icon">
  <link href="<?php echo base_url ?>assets/files/images/system/ssg.png" rel="apple-touch-icon">

  <!-- Remove Banner -->
  <script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v4.10.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <a href="<?php echo base_url ?>"><img src="<?php echo base_url ?>assets/files/images/system/ssg.png" alt="" class="img-fluid"></a>
        <a href="<?php echo base_url ?>"><small>Supreme Student Government</small></a>
      </h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto o" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="getstarted scrollto" href="<?php echo base_url ?>login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>JIMENEZ BETHEL INSTITUTE</h1>
          <h2>A Christ centered School</h2>
        </div>
      </div>

      <div class="col-md-12 mt-5">
        <video id="myVideo" width="100%" controls autoplay loop muted>
          <source src="<?php echo base_url ?>assets/files/videos/jbi-ads.mp4" type="video/mp4">
          <source src="<?php echo base_url ?>assets/files/videos/jbi-ads.ogg" type="video/ogg">
          Your browser does not support HTML video.
        </video>
      </div>

      <script>
        // Get the video element
        var video = document.getElementById("myVideo");

        // Function to handle the click event and unmute the video
        function handleClick() {
          video.muted = false;
          document.removeEventListener('click', handleClick);
        }

        // Add a click event listener to the document
        document.addEventListener('click', handleClick);
      </script>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="">Mission</a></h4>
            <p class="description"> Bestow Excellence Towards Holistic Empowered Learning</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="">Vision</a></h4>
            <p class="description">Fulfilled Academic Integrity Towards Holistic Growth</p>
          </div>
        </div>

        <div class="col-md-12 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href="">Goal</a></h4>
            <p class="description">Acquired Christ-Centered Transformed Individual Obedience and Nobleness</p>
          </div>
        </div>


      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Jimenez Bethel Institute</h2>
          <p>Jimenez Bethel Institute is a story of the Christian faith in action, of Christian stewardship in tithing, and of Christian courage. It was founded in 1947 as a stock corporation. The first school building was a poultry- like building and with only about 106 students to begin with. Nevertheless, what was seemed impossible was made possible because of the rugged faith and sacrifices of the members of the Jimenez Evangelical Church, Inc. specially the Board of Trustees members who put up not only their money, time, and talents but also their prayers and tears.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
            Among them were: Rev. Pastor W. Rivera, Mr. Francisco Agapia, Mr. Primo Cuezon, Mr. Honorato Apao, Mr. Marcelo Calope, Mr. Lucas Lluisma, Mr. Bonifacio Mutia, Mrs. Soledad C. Nery and others. In 1969 the school was converted to a non-stock and a non-profit secondary school related with the United Church of Christ in the Philippines (UCCP). 
            </p>
            
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            The school is headed by a Principal. The first principal of the school was the founder, Rev. Pastor W. Rivera, followed by Mr. Tadeo Dagaerag, Mr. Narciso Moncada, Mr. Ernane Fuentes, Mrs. Rosalinda Gloria, Rev. Daniel Carbonel. In 1963 Rev. Rivera came back and was later followed by Mr. Alberto Peralta, Rev. Silvino H. Mumar and Mr. Dionesio S. Vale, Sr. In 2002, Mrs. Leilaneeh V. Sabacahan was appointed as the Principal up to the present.
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row justify-content-end">

          <div class="col-lg-6 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
            <?php
              $total_student = "SELECT * FROM `user` WHERE user_type_id = 6";
              $total_student_query_run = mysqli_query($con, $total_student);
            ?>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php if($student_count = mysqli_num_rows($total_student_query_run)){
                  echo $student_count;
                } else{
                  echo '0';
                }
              ?>" data-purecounter-duration="2" class="purecounter"></span>
              <p>Students</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="2" class="purecounter"></span>
              <p>Strand</p>
            </div>
          </div>

        

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= About Video Section ======= -->
    <section id="about-video" class="about-video">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="fade-right" data-aos-delay="100">
            <img src="<?php echo base_url ?>assets/files/images/homepage/1.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3> One of the things that sets Jimenez Bethel Institute apart is our commitment to small class sizes and individualized attention. Our faculty is composed of highly qualified and experienced educators who are dedicated to helping each student reach their full potential.</h3>
            <p>
            In addition to a strong academic program, Jimenez Bethel Institute also offers a wide range of extracurricular activities and clubs. From sports teams to music and drama programs, there is something for everyone at our school. But it's not just about what happens inside the classroom. Our school is also committed to serving our local and global community. Students at Jimenez Bethel Institute have the opportunity to participate in volunteer and service projects, learning the importance of giving back and making a difference in the world.
            </p>
          </div>

        </div>

      </div>
    </section><!-- End About Video Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Strands Offered</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class='bx bx-calculator'></i>
              </div>
              <h4><a>ABM</a></h4>
              <p>Accountancy, Business and Management</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a>HUMMS</a></h4>
              <p style="font-size: 18px;">Humanities and Social Sciences      </p>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-yellow">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bx bx-layer"></i>
              </div>
              <h4><a href="">STEM</a></h4>
              <p>Science, Technology, Engineering, and Mathemathics</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Sevices Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Picture</h2>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/10.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/10.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url ?>assets/files/images/homepage/5.jpg" class="img-fluid" alt="" style="max-width: 112% !important;">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url ?>assets/files/images/homepage/5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Amazing person behind this amazing website</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url ?>assets/files/images/team/dev4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>MARK LESTER R. SUMINGUIT</h4>
                <span>Full Stack Developer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url ?>assets/files/images/team/dev3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>CARMEL D. MUTYA</h4>
                <span>Quality Assurance</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url ?>assets/files/images/team/dev2.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>BRIANNA JEAN C. EBARAT</h4>
                <span>System Designer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url ?>assets/files/images/team/dev.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>ANGEL A. BUAL</h4>
                <span>Researcher</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          <?php echo date('Y'); ?>&copy; Copyright <strong><span>JIMENEZ BETHEL INSTITUTE</span></strong>. All Rights Reserved <br>
          <!-- &copy; Copyright <strong><span>Tapi Tui for the picture</span></strong>. All Rights Reserved -->
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url ?>assets/js/main.js"></script>

</body>

</html>