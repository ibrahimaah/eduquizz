@extends('layouts.app')

@section('content')
<main class="main">
    <div class="container text-center mt-5">
        <h2>تم إكمال الاختبار!</h2>
        <h3>درجتك: {{ request('score') }}%</h3>
        
        <a href="{{ route('level.lessons', ['level' => $lesson->level_id]) }}" class="btn btn-success mt-3">
            <i class="bi bi-arrow-left"></i> العودة إلى الدروس
        </a>
    </div>
</main>
@endsection
