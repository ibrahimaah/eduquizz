<div class="sidebar">
    <div class="logo">
        <img src="https://placehold.co/400" alt="Logo">
        <h4 class="text-white mt-2">لوحة التحكم</h4>
    </div>
    <a href="{{ route('admin_dashboard') }}"><i class="fas fa-home me-2"></i>الرئيسية</a>
    <a href="{{ route('admin.statistics') }}"><i class="fas fa-chart-line me-2"></i>الإحصائيات</a>
    <a href="{{ route('admin.users') }}"><i class="fas fa-users me-2"></i>المستخدمين</a> 
    <a href="{{ route('admin.subjects') }}"><i class="fas fa-book me-2"></i>المواد</a> 
    
    <a href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt me-2"></i>تسجيل الخروج</a>
</div>