@extends('layouts.app')

@section('content')
<main class="main mb-5">
    <div class="container text-center mt-5">
        <h2 class="alert alert-info">تم إكمال الاختبار!</h2>
        <h3>درجتك: {{ $score }}%</h3>
        
        
        @if ($is_succeed)
      
        <a href="{{ route('level.lessons', ['level' => $next_lesson->level->id]) }}" class="btn btn-success mt-3">
             متابعة  <i class="bi bi-arrow-left"></i>
        </a>
        @else 
        <div class="alert alert-warning text-center fw-bold my-4">يجب أن يكون مجموعك أكبر من 80% لتتمكن من مشاهدة الدرس التالي. حظًا موفقًا!</div>
        <a href="{{ route('level.lessons', ['level' => $lesson->level_id]) }}" class="btn btn-success mt-3">
            العودة إلى الدروس  <i class="bi bi-arrow-right"></i>
        </a>
        @endif
    
    </div>
</main>
@endsection
