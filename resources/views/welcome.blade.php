<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - تصميم عصري</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 280px;
            position: fixed;
            top: 0;
            right: 0;
            background: linear-gradient(180deg, #28a745, #218838); /* Green gradient */
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            display: block;
            transition: all 0.3s ease;
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar .logo img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .main-content {
            margin-right: 280px;
            padding: 20px;
        }
        .navbar {
            margin-right: 280px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(90deg, #28a745, #218838); /* Green gradient */
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            background: #fff;
            border-radius: 0 0 10px 10px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #28a745, #218838); /* Green gradient */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="https://placehold.co/400" alt="Logo">
            <h4 class="text-white mt-2">لوحة التحكم</h4>
        </div>
        <a href="#"><i class="fas fa-home me-2"></i>الرئيسية</a>
        <a href="#"><i class="fas fa-chart-line me-2"></i>الإحصائيات</a>
        <a href="#"><i class="fas fa-users me-2"></i>المستخدمين</a>
        <a href="#"><i class="fas fa-cog me-2"></i>الإعدادات</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2"></i>تسجيل الخروج</a>
    </div>

    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">لوحة التحكم</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الإشعارات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الملف الشخصي</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="mb-4">مرحبًا بك في لوحة التحكم</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
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
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fas fa-users me-2"></i>المستخدمين</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">إدارة المستخدمين والإذونات.</p>
                        <a href="#" class="btn btn-primary">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>الإعدادات</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">تعديل إعدادات النظام.</p>
                        <a href="#" class="btn btn-primary">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>