@extends('layouts.app')

@section('content')
@push('styles')
<style>
  .level-card {
    transition: transform 0.3s ease-in-out;
  }

  .level-card:hover {
    transform: scale(1.05);
  }

  .disabled-link {
    pointer-events: none;
    /* Disable clicking */
    color: gray !important;
    cursor: not-allowed;
    text-decoration: none;
  }

  .disabled-card {
    background-color: #f0f0f0;
    opacity: 0.6;
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
            <h1>{{ $subject->title }}</h1>
            <p class="mb-0">{{ $subject->description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- Levels Section -->
  <section id="levels-section" class="section">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        @foreach($levels as $level)
        @php
          $isDisabled = ($level->id > $user_current_lesson->level->id);
        @endphp
        <div class="col-md-8">
          <a href="{{ $isDisabled ? '#' : route('level.lessons', ['level' => $level->id]) }}"
            class="text-decoration-none {{ $isDisabled ? 'disabled-link' : '' }}">
            <div class="card level-card shadow-sm p-3 mb-4 text-center {{ $isDisabled ? 'disabled-card' : '' }}">
              <div class="card-body">
                <h4 class="card-title">{{ $level->title }}</h4>
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- /Levels Section -->

</main>

@endsection