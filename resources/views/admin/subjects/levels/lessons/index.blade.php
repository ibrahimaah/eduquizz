@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">إدارة الدروس - {{ $level->title }}</h1>
    <a href="{{ route('admin.lessons.create', $level) }}" class="btn btn-primary mb-3">إضافة درس جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان الدرس</th> 
                <th>رابط الشرح</th> 
                <th>الترتيب</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lesson->title }}</td> 
                <td><a href="{{ $lesson->tutorial_link }}" class="btn btn-link" target="__blank">شاهد الدرس</a></td>
                <td>{{ $lesson->order }}</td>
                <td>
                    <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('admin.lessons.delete', $lesson->id) }}" method="POST" style="display:inline;">
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
