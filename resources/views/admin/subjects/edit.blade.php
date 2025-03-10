@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h4>تعديل المادة</h4>
        </div>
        <div class="card-body">
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
            <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label for="title" class="form-label">عنوان المادة</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $subject->title }}" required>
                </div>
 

                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control" id="description" name="description">{{ $subject->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">الصورة</label>
                    <input type="file" class="form-control" id="image" name="img">
                    @if($subject->hasMedia('subjects'))
                        <div class="mt-3">
                            <p>الصورة الحالية:</p>
                            <img src="{{ $subject->getFirstMediaUrl('subjects') }}" alt="صورة المادة" width="150">
                        </div>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">تحديث</button>
                    <a href="{{ route('admin.subjects') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

