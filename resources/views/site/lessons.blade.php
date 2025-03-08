@extends('layouts.app')

@section('content')
@push('styles')
<style>
  .lesson-card {
    transition: transform 0.3s ease-in-out;
  }
  .lesson-card:hover {
    transform: scale(1.05);
  }
</style>
@endpush

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>{{ $level->title }}</h1>
              <p class="mb-0">الدروس الخاصة بهذا المستوى</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Lessons Section -->
    <section id="lessons-section" class="section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          @foreach($lessons as $lesson)
          @php
            $isCardDisabled = $lesson->id > $user_current_lesson->id;  // Example condition to disable the card
          @endphp
          <div class="col-md-8">
            <div class="card lesson-card shadow-sm p-3 mb-4" 
                 @if($isCardDisabled) 
                   style="pointer-events: none; opacity: 0.5;" 
                 @endif>
              <div class="card-body">
                <p class="text-muted">الدرس <span class="">{{ $lesson->order }}</span></p>
                <h4 class="card-title">{{ $lesson->title }}</h4>
                
                <p>{{ $lesson->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="{{ $lesson->tutorial_link }}" target="_blank" class="btn btn-primary">
                     <span>شاهد الدرس</span><span> &nbsp;<i class="bi bi-play-circle"></i></span>
                  </a>
                  
                  <a href="{{ route('lesson.quiz', ['lesson' => $lesson->id]) }}" class="btn btn-warning">
                     بدء الاختبار &nbsp;<i class="bi bi-question-circle"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
        </div>
      </div>
    </section>
    <!-- /Lessons Section -->

</main>

@endsection
