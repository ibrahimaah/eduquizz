<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar -->
                 @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                <!-- Main Content -->
                <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>