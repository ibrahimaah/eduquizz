@extends('layouts.app')

@section('content')

 

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

</section>
 


 


@endsection