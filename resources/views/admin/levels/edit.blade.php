@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-white text-center">
            <h4>تعديل المستوى</h4>
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

            <form action="{{ route('admin.levels.update', $level->id) }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">عنوان المستوى</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $level->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="subject_id" class="form-label">المادة</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        <option value="">اختر المادة</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $level->subject_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">الترتيب</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ $level->order }}" min="1" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
                    <a href="{{ route('admin.levels') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
