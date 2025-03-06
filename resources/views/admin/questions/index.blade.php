@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">إدارة الاختبار - {{ $lesson->title }}</h1>

    <a href="{{ route('admin.questions.create', $lesson->id) }}" class="btn btn-success mb-3">إضافة سؤال جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>رقم السؤال</th>
                <th>السؤال</th>
                <th>النوع</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $question->question_number }}</td>
                <td class="align-middle w-50">{{ $question->question }}</td>
                <td class="align-middle">{{ $question->type == 'multiple_choice' ? 'اختيار من متعدد' : 'صح/خطأ' }}</td>
                <td class="align-middle w-25">
                    <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('admin.questions.delete', $question->id) }}" method="POST" style="display:inline;">
                        @csrf  
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <a href="{{ route('admin.lessons', $lesson->level_id) }}" class="btn btn-danger">رجوع</a>
    </div>
</div>
@endsection
