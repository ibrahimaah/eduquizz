@extends('layouts.admin_app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-white text-center">
            <h4>تعديل المستوى</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.levels.update', $level->id) }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="subject" class="form-label">المادة</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ $level->subject->title }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">عنوان المستوى</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $level->title }}" required>
                </div> 
                <div class="mb-3">
                    <label for="order" class="form-label">الترتيب</label>
                    <input type="number" class="form-control text-start" id="order" name="order" value="{{ $level->order }}" min="1" disabled required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">حفظ</button>
                    <a href="{{ route('admin.levels',['subject_id' => $level->subject_id]) }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
