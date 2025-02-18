@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">تفاصيل الفصل</h1>

    <div class="card">
        <div class="card-header">
            <h5>{{ $chapter->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>الوصف:</strong> {{ $chapter->description }}</p>
            <p><strong>المادة:</strong> {{ $chapter->subject->title }}</p>
            <p><strong>رابط الفيديو:</strong> <a href="{{ $chapter->video_url }}" target="_blank">شاهد الفيديو</a></p>
        </div>
    </div>

    <a href="{{ route('admin.chapters', ['subject_id' => $chapter->subject->id]) }}" class="btn btn-primary mt-3">عودة إلى الفصول</a>
</div>
@endsection
