@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h4>تعديل الفصل <span>({{ $chapter->order }})</span></h4>
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
            <form action="{{ route('admin.chapters.update', ['id' => $chapter->id]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">عنوان الفصل</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $chapter->title }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control" id="description"
                        name="description">{{ $chapter->description }}</textarea>
                </div>

                <!-- Video URL Field -->
                <div class="mb-3">
                    <label for="video_url" class="form-label">رابط الفيديو التوجيهي</label>
                    <input type="url" class="form-control" id="video_url" name="video_url"
                        placeholder="أدخل رابط الفيديو" value="{{ $chapter->video_url }}" required/>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">تحديث</button>
                    <a href="{{ route('admin.chapters', ['subject_id' => $chapter->subject_id]) }}"
                        class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection