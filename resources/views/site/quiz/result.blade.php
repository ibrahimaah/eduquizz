@extends('layouts.app')

@section('content')
<main class="main mb-5">
    <div class="container text-center mt-5">
        <h2 class="alert alert-info">تم إكمال الاختبار!</h2>
        
                <div class="alert alert-warning">
                    <h3>درجتك: {{ $score }}%</h3>
                </div>
             
           
                @if($is_succeed && $next_lesson)
                    <div class="alert alert-success text-center fw-bold my-4">
                        {{ $successMessages[array_rand($successMessages)] }}
                    </div>
                @else  
                <div class="alert alert-warning text-center fw-bold my-4">
                    {{ $failureMessages[array_rand($failureMessages)] }}
                </div>
                @endif
             
        

        <div class="alert alert-light my-2">
            <h4 class="my-3">مستوى التقدم في الدروس :</h4>
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $progress }}%;">{{ $progress }}%</div>
        </div>
        </div>

        @if ($is_succeed)
            @if($next_lesson)
               
                <a href="{{ route('level.lessons', ['level' => $next_lesson->level->id]) }}" class="btn btn-success mt-3">
                    متابعة <i class="bi bi-arrow-left"></i>
                </a>
            @else
                <div class="alert alert-success text-center fw-bold">تهانينا !! لقد قمت باجتياز كل المراحل</div>

                <!-- Certificate Card -->
                <div class="certificate border p-4 mt-4 rounded shadow bg-light">
                    <h2 class="fw-bold text-primary">شهادة إتمام</h2>
                    <p class="mt-3">هذا لإثبات أن</p>
                    <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
                    <p>قد أكمل بنجاح جميع الدروس المطلوبة في منصة <strong>EduQuiz</strong></p>

                    <hr class="my-4 w-50 mx-auto">

                    <div class="row mt-4">
                        <div class="col-6 text-start">
                            <p class="fw-bold">التاريخ: {{ now()->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-6 text-end">
                            <p class="fw-bold">التوقيع: <span class="text-primary">EduQuiz</span></p>
                        </div>
                    </div>
                </div>
                <!-- End Certificate -->
            @endif
        @else 
           
            
            <div class="alert alert-info text-center fw-bold my-4">
                ملاحظة : يجب أن يكون مجموعك أكبر من 80% لتتمكن من مشاهدة الدرس التالي. حظًا موفقًا!
            </div>
            <a href="{{ route('level.lessons', ['level' => $lesson->level_id]) }}" class="btn btn-success mt-3">
                العودة إلى الدروس <i class="bi bi-arrow-right"></i>
            </a>
        @endif
    </div>
</main>

<!-- Styles for the certificate -->
<style>
    .certificate {
        border: 5px solid #007bff;
        padding: 20px;
        max-width: 600px;
        margin: auto;
        background: white;
        position: relative;
    }
    .certificate::before {
        content: 'EduQuiz';
        font-size: 4rem;
        opacity: 0.1;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-weight: bold;
    }
</style>
@endsection
