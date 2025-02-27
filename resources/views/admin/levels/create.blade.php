@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h4>إضافة مستوى جديد</h4>
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

            <form action="{{ route('admin.levels.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">عنوان المستوى</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="subject_id" class="form-label">المادة</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        <option value="">اختر المادة</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">الترتيب</label>
                    <input type="number" class="form-control" id="order" name="order" min="1" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">إضافة</button>
                    <a href="{{ route('admin.levels') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
