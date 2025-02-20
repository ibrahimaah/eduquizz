@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">إدارة المواد</h1>
    <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">إضافة مادة جديدة</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان المادة</th>
                <th>عدد المستويات</th>
                <th>الوصف</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subject->title }}</td>
                <td>{{ $subject->num_of_levels }}</td>
                <td>{{ $subject->description }}</td>
                <td>
                    <img src="{{ $subject->getFirstMediaUrl('subjects') }}" alt="صورة المادة" width="100">
                </td>
                <td>
                    <a href="{{ route('admin.subjects.edit', ['id' => $subject->id]) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('admin.subjects.delete',  ['id' => $subject->id]) }}" method="POST" style="display:inline;">
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
