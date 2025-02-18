@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="text-success m-4">إدارة المستخدمين</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">إضافة مستخدم جديد</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">Show</a> --}}
                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('admin.users.delete',  ['id' => $user->id]) }}" method="POST" style="display:inline;">
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