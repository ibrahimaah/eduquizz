@extends('layouts.app')

@section('content')

<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>اختبارك مكتمل!</h1>
                    <p class="mb-2">نتيجتك: <strong>24 / {{ $score }}</strong></p>
                    <p class="mb-0">المستوى: <strong>{{ $student_level }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    @foreach($results as $result)
                    <div class="mb-3">
                        <p><strong>السؤال:</strong> {{ $result['question'] }}</p>
                        <p>
                            <strong>إجابتك:</strong> 
                            <span class="{{ $result['is_correct'] ? 'text-success' : 'text-danger' }}">
                                {{ $result['selected_option'] }}
                            </span>
                        </p>
                        <p><strong>الإجابة الصحيحة:</strong> {{ $result['correct_option'] }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>
            </div>
        
            <div class="d-flex justify-content-center">
                <a href="{{ route('subject.levels',['subject' => 1]) }}" class="btn btn-success mt-3">تصفح المادة</a>
            </div>
        </div>
    </div>
</div>
@endsection
