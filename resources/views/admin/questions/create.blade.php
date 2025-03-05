@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-primary m-4">إضافة سؤال جديد - {{ $lesson->title }}</h1>

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

    <form action="{{ route('admin.questions.store', $lesson->id) }}" method="POST">
        @csrf

        


        <div class="row">
            <div class="mb-3">
                <label class="form-label">السؤال</label>
                <input type="text" name="question" class="form-control" required>
            </div>
        </div>

        <div class="row">
           
    
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">نوع السؤال</label>
                    <select name="type" class="form-control" id="questionType" required>
                        <option value="multiple_choice">اختيار من متعدد</option>
                        <option value="true_false">صح/خطأ</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="order" class="form-label">رقم السؤال</label>
                    <input type="number" class="form-control text-start" id="order" name="question_number" value="{{ $question_number }}" min="1" readonly required>
                </div>
            </div>
        </div>

        <div id="trueFalseOptions" class="mb-3">
            <label class="form-label">الإجابة الصحيحة</label>
            <select name="correct_answer" class="form-control w-50">
                <option value="1">صح</option>
                <option value="0">خطأ</option>
            </select>
        </div>

        <div id="multipleChoiceOptions" class="mb-3">
            <label class="form-label">الخيارات</label>
            <div id="optionsContainer">
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
            </div>
        </div>
        
        

        <div class="mb-4 text-center">
            <button type="submit" class="btn btn-success">إضافة</button>
            <a href="{{ route('admin.lessons',$lesson->id) }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>


@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            let $questionType = $("#questionType"),
                $trueFalseOptions = $("#trueFalseOptions"),
                $multipleChoiceOptions = $("#multipleChoiceOptions");

            $questionType.on("change", function () {
                $trueFalseOptions.toggle($questionType.val() === "true_false");
                $multipleChoiceOptions.toggle($questionType.val() !== "true_false");
            }).trigger("change");
        });
    </script>
@endpush 
