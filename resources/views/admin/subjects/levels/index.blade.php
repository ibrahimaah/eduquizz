@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="d-flex">
        <h1 class="text-success m-4">إدارة المستويات - {{ $subject->title }}</h1>
        
    </div>
    <a href="{{ route('admin.levels.create',['subject_id' => $subject->id]) }}" class="btn btn-primary mb-3">إضافة مستوى جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان المستوى</th>
                <th>الترتيب</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($levels as $level)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $level->title }}</td>
                <td class="align-middle">{{ $level->order }}</td>
                <td class="align-middle">
                    <!-- Edit Level Button -->
                    <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                
                    <!-- Delete Level Button -->
                    <form action="{{ route('admin.levels.delete', $level->id) }}" method="POST" style="display:inline;">
                        @csrf  
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                
                    <!-- View Lessons Button for this Level -->
                    <a href="{{ route('admin.lessons', ['level' => $level->id]) }}" class="btn btn-sm btn-secondary">إدارة الدروس</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
