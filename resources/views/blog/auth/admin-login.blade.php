@extends('blog.app')
@section('title', 'login')

@section('content')

    <div class="login-box">
        <h3 class="text-center mb-4">Login</h3>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                    autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <!-- Divider -->
            <div class="text-center text-muted mb-3">or</div>

            <!-- GitHub Login Button -->
            <a href="{{ route('login.github') }}" class="btn btn-dark w-100">
                <i class="fab fa-github me-2"></i> Login with GitHub
            </a>
        </form>
    </div>


@endsection
