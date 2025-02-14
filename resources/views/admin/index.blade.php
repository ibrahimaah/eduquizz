@extends('layouts.admin_app')

@section('content')
<div class="main-content">
        
    <h1 class="mb-4 text-center text-success">مرحبًا بك في لوحة التحكم</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-line me-2"></i>الإحصائيات</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">عرض الإحصائيات والأرقام المهمة.</p>
                    <a href="#" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-users me-2"></i>المستخدمين</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">إدارة المستخدمين .</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
        </div>
   
    </div>
</div>
@endsection