@extends('layouts.app')

@section('content')

 
 
<!-- Contact/Support Form Section -->
<section id="student-problem" class="section contact-form-section light-background">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>واجهت مشكلة؟</h2>
        <p>شاركنا مشكلتك وسنقوم بمساعدتك في أقرب وقت</p>
      </div>
  
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
  
      @if (session('success'))
          <div class="alert alert-success text-center">
              {{ session('success') }}
          </div>
      @endif
  
      <form action="{{ route('student.problem.submit') }}" method="POST" class="php-email-form">
        @csrf
        <div class="row gy-4">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="الاسم الكامل" required>
          </div>
  
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
          </div>
  
          <div class="col-12">
            <textarea name="message" rows="5" class="form-control" placeholder="اكتب مشكلتك هنا..." required></textarea>
          </div>
  
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-success">إرسال</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  

@endsection