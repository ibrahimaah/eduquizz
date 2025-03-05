@extends('layouts.auth_app')

@section('title', 'إنشاء حساب')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="row g-0">
                        <!-- Form Section -->
                        <div class="col-md-6">
                            <div class="card-body p-5">
                                <h3 class="text-center mb-4 text-success">إنشاء حساب جديد</h3>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Full Name Field -->
                                   <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="name" class="form-label">الاسم الكامل</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
    
                                      
                                    </div>
                                    <div class="col-md-6">
                                          <!-- Age Field -->
                                          <div class="mb-4">
                                            <label for="age" class="form-label">العمر</label>
                                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}" required>
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   </div>

                                    <!-- Email Field -->
                                    <div class="mb-4">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Password Field -->
                                            <div class="mb-4">
                                                <label for="password" class="form-label">كلمة المرور</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                   
                                        </div>
                                        <div class="col-md-6">
                                             <!-- Confirm Password Field -->
                                            <div class="mb-4">
                                                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success w-100">إنشاء حساب</button>
                                    </div>
                                </form>

                                <div class="mt-3 text-center">
                                    <p>لديك حساب بالفعل؟ <a href="{{ route('showLoginForm') }}">تسجيل الدخول</a></p>
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
