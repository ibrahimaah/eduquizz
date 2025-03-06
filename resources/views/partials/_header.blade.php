<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">EduQuiz</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active pe-0">الصفحة الرئيسية</a></li>
                <li><a href="#about">من نحن</a></li>
                <li><a href="#courses">المواد التعليمية</a></li>
                {{-- <li><a href="#">تواصل معنا</a></li> --}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @guest 
        <a class="btn-getstarted" href="{{ route('showLoginForm') }}">تسجيل الدخول</a>
        @endguest

        @auth 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="btn-getstarted" onclick="document.getElementById('logout-form').submit();">تسجيل الخروج</a>
        
        @endauth
    </div>
</header>