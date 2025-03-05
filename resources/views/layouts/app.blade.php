<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'EduQuiz')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('common/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <link href="{{ asset('site/css/main.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="index-page">

    @include('partials._header')

    <main class="main">
        @yield('content')
    </main>

    @include('partials._footer')


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <!-- JS Files -->
    <script src="{{ asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('site/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('site/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('site/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('site/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>

    @stack('scripts')

</body>

</html>