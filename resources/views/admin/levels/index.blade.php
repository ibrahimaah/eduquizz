@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">إدارة المستويات</h1>
    <a href="{{ route('admin.levels.create') }}" class="btn btn-primary mb-3">إضافة مستوى جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان المستوى</th>
                <th>المادة</th>
                <th>الترتيب</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($levels as $level)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $level->title }}</td>
                <td>{{ $level->subject->title }}</td>
                <td>{{ $level->order }}</td>
                <td>
                    <!-- Edit Level Button -->
                    <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                
                    <!-- Delete Level Button -->
                    <form action="{{ route('admin.levels.delete', $level->id) }}" method="POST" style="display:inline;">
                        @csrf  
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                
                    <!-- View Lessons Button for this Level -->
                    <a href="{{ route('admin.lessons', ['level' => $level->id]) }}" class="btn btn-sm btn-info">عرض الدروس</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
