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

            <form action="{{ route('admin.lessons.update', [$level_id, $lesson->id]) }}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label for="title" class="form-label">عنوان الدرس</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="chapter" class="form-label">الفصل</label>
                    <select class="form-control" id="chapter" name="chapter" required>
                        <option value="chapter_1" {{ $lesson->chapter == 'chapter_1' ? 'selected' : '' }}>الفصل 1</option>
                        <option value="chapter_2" {{ $lesson->chapter == 'chapter_2' ? 'selected' : '' }}>الفصل 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">الترتيب</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ $lesson->order }}" min="1" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">تحديث</button>
                    <a href="{{ route('admin.lessons', $level_id) }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
