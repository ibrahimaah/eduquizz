@extends('layouts.app')

@section('content')
@push('styles')
<style>
    .question-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .question-text {
        font-size: 18px;
        font-weight: bold;
    }

    .options label {
        display: block;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .options input[type="radio"] {
        display: none;
    }

    .options label:hover,
    .options input[type="radio"]:checked+label {
        background-color: var(--accent-color);
        color: #fff;
    }

    .submit-btn {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 18px;
        margin-top: 20px;
    }
</style>
@endpush

<main class="main mb-4">


    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>اختبار تحديد المستوى</h1>
                        <p class="mb-0"><span class="fw-bold text-warning">ملاحظة : </span>  هذا الاختبار لمرة واحدة فقط !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form id="placementTestForm" action="{{ route('placement_test.submit') }}" method="POST">
                    @csrf
                    @foreach($questions as $question)
                    <div class="question-card p-3 border rounded mb-3">
                        <p class="question-text fw-bold">{{ $loop->iteration }}. {{ $question->question }}</p>
                        <div class="options">
                            @php
                                $optionLabels = ['a', 'b', 'c', 'd']; // Option labels
                            @endphp
                            @foreach($question->options as $key => $option)
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input me-2" type="radio" name="question_{{ $question->id }}"
                                    id="option_{{ $option->id }}" value="{{ $option->id }}">
                                <label class="form-check-label w-100 d-flex" for="option_{{ $option->id }}">
                                    <span class="fw-bold me-2">({{ $optionLabels[$key] }})</span> {{ $option->option }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-success submit-btn">إرسال الاختبار</button>
                </form>
            </div>
            
            
        </div>
    </div>
</main>

@push('scripts')
{{-- <script>
    $(document).ready(function() {
        $('#placementTestForm').submit(function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.post("{{ route('placement_test.submit') }}", formData, function(response) {
                alert("تم إرسال الاختبار بنجاح!");
            }).fail(function() {
                alert("حدث خطأ أثناء إرسال الاختبار");
            });
        });
    });
</script> --}}
@endpush
@endsection