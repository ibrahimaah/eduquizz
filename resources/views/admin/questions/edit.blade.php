@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-primary m-4">تعديل السؤال - {{ $question->lesson->title }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
        @csrf
          
        <div class="mb-3">
            <label for="order" class="form-label">رقم السؤال</label>
            <input type="number" class="form-control text-start" id="order" name="question_number" value="{{ $question->question_number }}" min="1" readonly required>
        </div>

        <div class="mb-3">
            <label class="form-label">السؤال</label>
            <input type="text" name="question" class="form-control" value="{{ $question->question }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">نوع السؤال</label>
            <select name="type" class="form-control" id="questionType" required>
                <option value="multiple_choice" {{ $question->type == 'multiple_choice' ? 'selected' : '' }}>اختيار من متعدد</option>
                <option value="true_false" {{ $question->type == 'true_false' ? 'selected' : '' }}>صح/خطأ</option>
            </select>
        </div>

        <div id="trueFalseOptions" class="mb-3" style="{{ $question->type == 'true_false' ? '' : 'display:none;' }}">
            <label class="form-label">الإجابة الصحيحة</label>
            <select name="correct_answer" class="form-control w-50">
                <option value="1" {{ $question->correct_answer == 1 ? 'selected' : '' }}>صح</option>
                <option value="0" {{ $question->correct_answer == 0 ? 'selected' : '' }}>خطأ</option>
            </select>
        </div>

        <div id="multipleChoiceOptions" class="mb-3" style="{{ $question->type == 'multiple_choice' ? '' : 'display:none;' }}">
            <label class="form-label">الخيارات</label>
            <div id="optionsContainer">
                @if($question->options()->exists())
                    @foreach($question->options as $index => $option)
                        <div class="input-group mb-2">
                            <div class="w-50">
                                <input type="text" name="options[]" class="form-control" value="{{ $option->option_text }}" placeholder="الخيار">
                            </div>
                            <div class="d-flex align-items-center ms-2">
                                <input type="radio" name="is_correct" value="{{ $index }}" class="radio-btn" {{ $option->is_correct ? 'checked' : '' }}>
                                <span class="ms-2">صحيح؟</span>
                            </div>
                        </div>
                    @endforeach
                @else   
                    <div class="input-group mb-2">
                        <div class="w-50">
                            <input type="text" name="options[]" class="form-control" placeholder="الخيار">
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <input type="radio" name="is_correct" value="0" class="radio-btn">
                            <span class="ms-2">صحيح؟</span>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="w-50">
                            <input type="text" name="options[]" class="form-control" placeholder="الخيار">
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <input type="radio" name="is_correct" value="1" class="radio-btn">
                            <span class="ms-2">صحيح؟</span>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="w-50">
                            <input type="text" name="options[]" class="form-control" placeholder="الخيار">
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <input type="radio" name="is_correct" value="2" class="radio-btn">
                            <span class="ms-2">صحيح؟</span>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="w-50">
                            <input type="text" name="options[]" class="form-control" placeholder="الخيار">
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <input type="radio" name="is_correct" value="3" class="radio-btn">
                            <span class="ms-2">صحيح؟</span>
                        </div>
                    </div>
                @endif   
            </div>
        </div>

        <div class="mb-4 text-center">
            <button type="submit" class="btn btn-success">حفظ</button>
            <a href="{{ route('admin.lessons',$question->lesson->id) }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let questionType = document.getElementById("questionType");
    let trueFalseOptions = document.getElementById("trueFalseOptions");
    let multipleChoiceOptions = document.getElementById("multipleChoiceOptions");

    function toggleOptions() 
    {
        if (questionType.value === "true_false") {
            trueFalseOptions.style.display = "block";
            multipleChoiceOptions.style.display = "none";
        } else { 
            trueFalseOptions.style.display = "none";
            multipleChoiceOptions.style.display = "block";
        }
    }

    questionType.addEventListener("change", toggleOptions);
    toggleOptions();
});
</script>
@endsection
