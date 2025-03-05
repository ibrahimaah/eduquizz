@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">إدارة المواد</h1>
    <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">إضافة مادة جديدة</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان المادة</th> 
                <th>الوصف</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $subject->title }}</td>  
                <td class="align-middle">{{ $subject->description }}</td>
                <td class="align-middle">
                    <img src="{{ $subject->getFirstMediaUrl('subjects') }}" alt="صورة المادة" width="100">
                </td>
                <td class="align-middle">
                    <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('admin.subjects.delete',  $subject->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                    <a href="{{ route('admin.levels', $subject->id) }}" class="btn btn-sm btn-secondary">إدارة المستويات</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
