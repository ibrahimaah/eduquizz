@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h4>تعديل الدرس</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label for="subject" class="form-label">المادة</label>
                    <input type="text" class="form-control" id="subject" name="subject"  value="{{ $lesson->level->subject->title }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">المستوى</label>
                    <input type="text" class="form-control" id="level" name="level" value="{{ $lesson->level->title }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">الترتيب</label>
                    <input type="number" class="form-control text-start" id="order" value="{{ $lesson->order }}" name="order" min="1" disabled>
                </div> 

                <div class="mb-3">
                    <label for="title" class="form-label">عنوان الدرس</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}" required>
                </div> 

                <div class="mb-3">
                    <label for="tutorial_link" class="form-label">رابط الشرح</label>
                    <input type="text" class="form-control" id="tutorial_link" name="tutorial_link" value="{{ $lesson->tutorial_link }}" dir="ltr" required>
                </div>  

                <div class="text-center">
                    <button type="submit" class="btn btn-success">حفظ</button>
                    <a href="{{ route('admin.lessons', $lesson->level_id) }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
