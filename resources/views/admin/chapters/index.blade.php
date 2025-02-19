@extends('layouts.admin_app')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<div class="container">
    <h1 class="text-success fw-bold m-4">
        إدارة الفصول  
        <span class="text-dark">الخاصة بمادة</span>  
        <span class="text-primary">{{ $subject->title }}</span>
    </h1>
    
    <a href="{{ route('admin.chapters.create',['subject_id' => $subject->id]) }}" class="btn btn-primary mb-3">إضافة فصل جديد</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم الفصل</th>
                <th>عنوان الفصل</th>
                <th>الوصف</th> 
                <th>رابط الفيديو</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chapters as $chapter)
            <tr>
                <td>{{ $chapter->order }}</td>
                <td>{{ $chapter->title }}</td>
                <td>{{ $chapter->description ? Str::limit($chapter->description, 50, '...') : 'لا يوجد' }}</td> 
                <td> 
                    <a href="{{ $chapter->video_url }}" target="_blank" class="btn btn-sm btn-info">شاهد الفيديو</a>
                </td>
                
                <td>
                    
                    <a href="{{ route('admin.chapters.show', ['id' => $chapter->id]) }}" class="btn btn-sm btn-info">عرض</a>
                    <a href="{{ route('admin.chapters.edit', ['id' => $chapter->id]) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('admin.chapters.delete',  ['id' => $chapter->id]) }}" method="POST" style="display:inline;">
                        @csrf 
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
