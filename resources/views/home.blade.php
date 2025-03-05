@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <img src="{{ asset('site/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

  <div class="container">
    <h2 data-aos="fade-up" data-aos-delay="100">اكتسب المعرفة اليوم <br>واصنع المستقبل غدًا</h2>
    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
      <a href="{{ route('placement_test') }}" class="btn-get-started">هيا بنا نبدأ</a>
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
          نؤمن بأن التعلم هو مفتاح المستقبل، لذلك نقدم لك منصة تعليمية متكاملة تجمع بين المعرفة والتطبيق. نوفر لك
          مجموعة من

          <strong>المواد الدراسية</strong>
          ، وكل مادة تحتوي على <strong>فصول تعليمية </strong>تليها
          اختبارات قصيرة لتعزيز فهمك وضمان استيعابك للمحتوى.
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
          <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>مادة تعليمية</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-md-4">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>فصل دراسي</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-md-4">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1"
            class="purecounter"></span>
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
            <p class="description">مقدمة في الجبر والدوال الرياضية وكيفية استخدامها في حل المعادلات والمشاكل
              الرياضية المختلفة.</p>

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
            <p class="description">دورة تدريبية لفهم القواعد الأساسية في اللغة الإنجليزية بما في ذلك النحو
              والمفردات.</p>

          </div>
        </div>
      </div> <!-- End Course Item-->

    </div>

  </div>

</section><!-- /مواد دراسية مدرسية Section -->

@endsection