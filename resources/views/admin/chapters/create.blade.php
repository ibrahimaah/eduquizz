@extends('layouts.admin_app')

@section('content')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة فصل جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4>إضافة فصل جديد</h4>
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
                <form action="{{ route('admin.chapters.store',['subject_id' => $subject->id]) }}" method="POST">
                    @csrf 
                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان الفصل</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    
                     <!-- Video URL Field -->
                     <div class="mb-3">
                        <label for="video_url" class="form-label">رابط الفيديو التوجيهي</label>
                        <input type="url" class="form-control" id="video_url" name="video_url" placeholder="أدخل رابط الفيديو" required/>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">إضافة</button>
                        <a href="{{ route('admin.chapters',['subject_id' => $subject->id]) }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
