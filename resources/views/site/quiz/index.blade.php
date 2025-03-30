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

 
  /* Main section styling */
  #quiz-section {
      background-color: #f8f9fa;
      padding: 2rem 0;
  }

  .question-card {
      border-radius: 12px;
      border: none;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: white;
  }

  .question-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .question-title {
      color: #2c3e50;
      font-weight: 600;
      margin-bottom: 1.5rem;
      padding-bottom: 0.5rem;
      border-bottom: 1px solid #eee;
  }

  /* Custom radio button styling */
  .custom-radio-container {
      margin-bottom: 1rem;
  }

  .custom-radio-input {
      position: absolute;
      opacity: 0;
  }

  .custom-radio-label {
      display: flex;
      align-items: center;
      cursor: pointer;
      position: relative;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      transition: all 0.3s ease;
      background-color: #f8f9fa;
      border: 1px solid #e0e0e0;
  }

  .custom-radio-label:hover {
      background-color: #e9f5ff;
      border-color: #b8d8f8;
  }

  .custom-radio-button {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 2px solid #6c757d;
      border-radius: 50%;
      margin-left: 10px;
      position: relative;
      transition: all 0.3s ease;
  }

  .option-text {
      flex-grow: 1;
      color: #495057;
      font-size: 1rem;
  }

  .custom-radio-input:checked + .custom-radio-label {
      background-color: #e1f0ff;
      border-color: #4a90e2;
  }

  .custom-radio-input:checked + .custom-radio-label .custom-radio-button {
      border-color: #4a90e2;
      background-color: #4a90e2;
  }

  .custom-radio-input:checked + .custom-radio-label .custom-radio-button::after {
      content: '';
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: white;
      border-radius: 50%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }

  /* True/False specific styling */
  .true-false-container {
      display: flex;
      gap: 1rem;
  }

  .true-false-option {
      flex: 1;
  }

  .true-label:hover {
      background-color: #e6ffed;
      border-color: #a3e9b4;
  }

  .false-label:hover {
      background-color: #ffebee;
      border-color: #ffb3b3;
  }

  .custom-radio-input:checked + .true-label {
      background-color: #e6ffed;
      border-color: #4caf50;
  }

  .custom-radio-input:checked + .true-label .custom-radio-button {
      border-color: #4caf50;
      background-color: #4caf50;
  }

  .custom-radio-input:checked + .false-label {
      background-color: #ffebee;
      border-color: #f44336;
  }

  .custom-radio-input:checked + .false-label .custom-radio-button {
      border-color: #f44336;
      background-color: #f44336;
  }

 

  /* Responsive adjustments */
  @media (max-width: 768px) {
      .true-false-container {
          flex-direction: column;
          gap: 0.5rem;
      }
      
      .custom-radio-label {
          padding: 0.6rem 0.8rem;
      }
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
                    <h5 class="card-title question-title">السؤال {{ $question->question_number }}: {{ $question->question }}</h5>

                    <div class="question-options mt-4">
                        @if($question->type == 'multiple_choice')
                            @foreach($question->options as $option)
                            <div class="custom-radio-container">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" 
                                       id="option{{ $option->id }}" class="custom-radio-input">
                                <label for="option{{ $option->id }}" class="custom-radio-label">
                                    <span class="custom-radio-button"></span>
                                    <span class="option-text">{{ $option->option_text }}</span>
                                </label>
                            </div>
                            @endforeach
                        @elseif($question->type == 'true_false')
                            <div class="custom-radio-container true-false-container">
                                <div class="true-false-option">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="1" 
                                           id="true{{ $question->id }}" class="custom-radio-input">
                                    <label for="true{{ $question->id }}" class="custom-radio-label true-label">
                                        <span class="custom-radio-button"></span>
                                        <span class="option-text">صح</span>
                                    </label>
                                </div>
                                <div class="true-false-option">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="0" 
                                           id="false{{ $question->id }}" class="custom-radio-input">
                                    <label for="false{{ $question->id }}" class="custom-radio-label false-label">
                                        <span class="custom-radio-button"></span>
                                        <span class="option-text">خطأ</span>
                                    </label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success"> 
                    <span>إرسال الإجابات</span>
                    <i class="bi bi-check-circle"></i> 
                </button>
                <a href="{{ route('level.lessons',$lesson->level->id) }}" class="btn btn-danger">
                    <span>إلغاء</span>
                </a>
            </div>
        </form>
    </div>
</section>


  <!-- /قسم الاختبار -->
@endif
</main>

@endsection