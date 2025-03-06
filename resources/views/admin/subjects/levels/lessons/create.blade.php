@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <div class="d-flex">
                <h4>إضافة درس جديد</h4>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
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

            <form action="{{ route('admin.lessons.store', $level) }}" method="POST">
                @csrf
                <input type="hidden" name="level_id" value="{{ $level->id }}">
               
                <div class="mb-3">
                    <label for="subject" class="form-label">المادة</label>
                    <input type="text" class="form-control" id="subject" name="subject"  value="{{ $level->subject->title }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">المستوى</label>
                    <input type="text" class="form-control" id="level" name="level" value="{{ $level->title }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">الترتيب</label>
                    <input type="number" class="form-control text-start" id="order" value="{{ $lesson_order }}" name="order" min="1" readonly>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">عنوان الدرس</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div> 

                <div class="mb-3">
                    <label for="tutorial_link" class="form-label">رابط الشرح</label>
                    <input type="text" class="form-control" id="tutorial_link" name="tutorial_link" dir="ltr" required>
                </div> 

                <div class="text-center">
                    <button type="submit" class="btn btn-success">إضافة</button>
                    <a href="{{ route('admin.lessons', $level) }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
