<!-- resources/views/admin/statistics.blade.php -->
@extends('layouts.admin_app')

@section('content')
<div class="main-content">
    <h1 class="mb-4 text-center text-success">إحصائيات النظام</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-users me-2"></i>عدد المستخدمين</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">إجمالي عدد المستخدمين في النظام: {{ $userCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-boxes me-2"></i>عدد المواد</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">إجمالي عدد المواد في النظام: {{ $subjectCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
