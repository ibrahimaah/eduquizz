@extends('layouts.app')

@section('content')
@push('styles')
<style>
    .page-title nav ol li+li::before{
        padding-left: 10px !important;
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
              <h1>اختبار تحديد المستوى</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">الصفحة الرئيسية</a></li>
            <li class="current">اختبار تحديد المستوى</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

       

      <div class="container" data-aos="fade-up">
       
      </div>

    </section>
    <!-- /Starter Section Section -->

  </main>
 
@endsection
