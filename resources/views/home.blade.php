<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>الصفحة الرئيسية</title>  

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site/vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('site/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


  <link href="{{ asset('site/css/main.css') }}" rel="stylesheet">
 
</head>




<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">EduQuiz</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ route('home') }}" class="active">الصفحة الرئيسية<br></a></li>
            <li><a href="#">حول الموقع</a></li>
            <li><a href="#">المواد التعليمية</a></li>
            <li><a href="#">تواصل معنا</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="courses.html">إنشاء حساب</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('site/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">اكتسب المعرفة اليوم <br>واصنع المستقبل غدًا</h2> 
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.html" class="btn-get-started">هيا بنا نبدأ</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('site/img/about.jpg') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>من نحن</h3>
            <p class="fst-italic">
                نؤمن بأن التعلم هو مفتاح المستقبل، لذلك نقدم لك منصة تعليمية متكاملة تجمع بين المعرفة والتطبيق. نوفر لك مجموعة من <strong>المواد الدراسية</strong>، وكل مادة تحتوي على <strong>فصول تعليمية</strong> تشمل <strong>دروس فيديو تفاعلية</strong>، تليها <strong>اختبارات قصيرة</strong> لتعزيز فهمك وضمان استيعابك للمحتوى.
            </p>
            <ul>
                <li><i class="bi bi-check-circle"></i> <span>تعلم بأسلوب ممتع وسهل</span></li>
                <li><i class="bi bi-check-circle"></i> <span>شاهد الدروس في أي وقت ومن أي مكان</span></li>
                <li><i class="bi bi-check-circle"></i> <span>اختبر معلوماتك بعد كل درس لتقوية مهاراتك</span></li>
            </ul>
            
        </div>
        

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-md-4">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
                    <p>مادة تعليمية</p>
                </div>
            </div><!-- End Stats Item -->
        
            <div class="col-md-4">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>
                    <p>فصل دراسي</p>
                </div>
            </div><!-- End Stats Item -->
        
            <div class="col-md-4">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>
                    <p>اختبار</p>
                </div>
            </div><!-- End Stats Item -->
        
       
        
        </div>
        

      </div>

    </section><!-- /Counts Section -->
  

    <!-- مواد دراسية مدرسية Section -->
<section id="courses" class="courses section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>مواد دراسية</h2>
      <p>المواد الدراسية الشائعة</p>
    </div><!-- End Section Title -->
  
    <div class="container">
  
      <div class="row">
  
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            <img src="{{ asset('site/img/course-1.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">رياضيات</p>
                
              </div>
  
              <h3><a href="course-details.html">الجبر</a></h3>
              <p class="description">مقدمة في الجبر والدوال الرياضية وكيفية استخدامها في حل المعادلات والمشاكل الرياضية المختلفة.</p>
             
            </div>
          </div>
        </div> <!-- End Course Item-->
  
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="course-item">
            <img src="{{ asset('site/img/course-2.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">الفيزياء</p>
                
              </div>
  
              <h3><a href="course-details.html">الميكانيكا</a></h3>
              <p class="description">دراسة قوانين الحركة والطاقة وكيفية تأثيرها على الأجسام في النظام الفيزيائي.</p>
           
            </div>
          </div>
        </div> <!-- End Course Item-->
  
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="course-item">
            <img src="{{ asset('site/img/course-3.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">اللغة الإنجليزية</p>
                
              </div>
  
              <h3><a href="course-details.html">قواعد اللغة الإنجليزية</a></h3>
              <p class="description">دورة تدريبية لفهم القواعد الأساسية في اللغة الإنجليزية بما في ذلك النحو والمفردات.</p>
           
            </div>
          </div>
        </div> <!-- End Course Item-->
  
      </div>
  
    </div>
  
  </section><!-- /مواد دراسية مدرسية Section -->
  

     
  </main>

  <footer id="footer" class="footer text-center light-background">
    <div class="container py-4">
      <p>© <strong>EduQuiz</strong> - جميع الحقوق محفوظة</p>
    </div>
  </footer>
  
  

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
    <!-- JS Files -->
    <script src="{{ asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('site/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('site/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('site/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('site/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>

</body>

</html>