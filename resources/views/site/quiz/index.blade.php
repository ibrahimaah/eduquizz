@extends('layouts.app')

@section('content')
@push('styles')
<style>
  body {
    direction: rtl;
    text-align: right;
  }

  .question-card {
    transition: transform 0.3s ease-in-out;
  }

  .question-card:hover {
    transform: scale(1.02);
  }

  .question-options label {
    cursor: pointer;
  }
</style>
@endpush

<main class="main">



  <!-- عنوان الصفحة -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>اختبار - {{ $lesson->title }}</h1>
            <p class="mb-0">أجب عن الأسئلة التالية لاختبار معرفتك.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('subject.levels',$lesson->level->subject->id) }}">{{ $lesson->level->subject->title
              }}</a></li>
          <li><a href="{{ route('level.lessons',$lesson->level->id) }}">{{ $lesson->level->title }}</a></li>
          <li class="current"> اختبار - {{ $lesson->title }}</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- نهاية عنوان الصفحة -->
  @if($questions->count() == 0)
  <div class="alert alert-warning fw-bold my-5 text-center">لم يتم إضافة أسئلة لهذا الدرس من قبل الأدمن</div>
  @else
  <!-- قسم الاختبار -->
  <section id="quiz-section" class="section">
    <div class="container" data-aos="fade-up">
      <form id="quiz-form" method="POST" action="{{ route('quiz.submit', $lesson->id) }}">
        @csrf
        @foreach($questions as $question)
        <div class="card question-card shadow-sm p-3 mb-4">
          <div class="card-body">
            <h5 class="card-title">السؤال {{ $question->question_number }}: {{ $question->question }}</h5>

            <div class="question-options">
              @if($question->type == 'multiple_choice')
              @foreach($question->options as $option)
              <div class="form-check">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}"
                  id="option{{ $option->id }}" class="form-check-input">
                <label for="option{{ $option->id }}" class="form-check-label">{{ $option->option_text }}</label>
              </div>
              @endforeach
              @elseif($question->type == 'true_false')
              <div class="form-check">
                <input type="radio" name="answers[{{ $question->id }}]" value="1" id="true{{ $question->id }}"
                  class="form-check-input">
                <label for="true{{ $question->id }}" class="form-check-label">صح</label>
              </div>
              <div class="form-check">
                <input type="radio" name="answers[{{ $question->id }}]" value="0" id="false{{ $question->id }}"
                  class="form-check-input">
                <label for="false{{ $question->id }}" class="form-check-label">خطأ</label>
              </div>
              @endif
            </div>

          </div>
        </div>
        @endforeach

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success"> إرسال الإجابات <i class="bi bi-check-circle"></i> </button>
          <a href="{{ route('level.lessons',$lesson->level->id) }}" class="btn btn-danger">إلغاء</a>
        </div>

      </form>
    </div>
  </section>
  <!-- /قسم الاختبار -->
  @endif
</main>

@endsection