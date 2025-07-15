<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">MyBlog</a>

        <div class="ms-auto">
            @auth
                <span class="text-light me-3">Welcome, {{ Auth::user()->name }}</span>

                <!-- Dashboard Button -->
                @if (Auth::user()->user_type != 'reader')
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-light me-2">Dashboard</a>
                @endif

                {{-- Logout Bitton   --}}
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light">Login</a>
            @endauth
        </div>
    </div>
</nav>
