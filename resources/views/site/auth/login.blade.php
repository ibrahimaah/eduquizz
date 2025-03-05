@extends('layouts.auth_app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card shadow-lg">
                    <div class="row g-0">
                       

                        <!-- Form Section -->
                        <div class="col-md-6">
                            <div class="card-body p-5">
                                <h3 class="text-center mb-4 text-success">تسجيل الدخول</h3>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Field -->
                                    <div class="mb-4">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password Field -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">كلمة المرور</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success w-100">تسجيل الدخول</button>
                                    </div>
                                </form>

                                <div class="mt-3 text-center">
                                    <p>ليس لديك حساب؟ <a href="{{ route('showRegisterForm') }}">إنشاء حساب جديد</a></p>
                                </div>
                                <div class="mt-3 text-center">
                                    <p>عودة إلى  <a href="{{ route('home') }}">الصفحة الرئيسية</a></p>
                                </div>
                            </div>
                        </div>
                         <!-- Image Section -->
                         <div class="col-md-6">
                            <img src="{{ asset('imgs/login_img.webp') }}" alt="Website Image" class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
