@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <img src="{{ asset('site/img/hero-bg.jfif') }}" alt="" data-aos="fade-in">

  <div class="container">
    <h2 data-aos="fade-up" data-aos-delay="100">اكتسب المعرفة اليوم <br>واصنع المستقبل غدًا</h2>
    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
      <a href="{{ route('placement_test') }}" class="btn-get-started">هيا بنا نبدأ</a>
    </div>
  </div>

</section><!-- /Hero Section -->

 

<!-- Counts Section -->
{{-- <section id="counts" class="section counts light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-md-4">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>مادة تعليمية</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>فصل دراسي</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>اختبار</p>
        </div>
      </div>



    </div>


  </div>

</section> --}}
<!-- /Counts Section -->


<!-- مواد دراسية مدرسية Section -->
<section id="courses" class="courses section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>مواد دراسية</h2>
    <p>المواد الدراسية المتاحة</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row">

      @foreach ($subjects as $subject)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="course-item">
          <img src="{{ $subject->getFirstMediaUrl('subjects') }}" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-center align-items-center mb-3">
              
                <a href="{{ route('subject.levels',$subject->id) }}" class="btn btn-success">{{ $subject->title }}</a>
               
            </div>

            {{-- <h3><a href="{{ route('subject.levels',$subject->id) }}">{{ $subject->title }}</a></h3> --}}
            <p class="description">
              {{ $subject->description }}
            </p>

          </div>
        </div>
      </div> 
      @endforeach

    </div>

  </div>

</section><!-- /مواد دراسية مدرسية Section -->






@endsection