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
        <div class="row">
          @foreach($levels as $level)
          <div class="col-md-4">
            <a href="{{ route('level.lessons', ['level' => $level->id]) }}" class="text-decoration-none">
              <div class="card level-card shadow-sm p-3 mb-4 text-center">
                <div class="card-body">
                  <h4 class="card-title">{{ $level->title }}</h4>
                  <p class="text-muted">رقم المستوى {{ $level->order }}</p>
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
