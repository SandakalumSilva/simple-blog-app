@extends('blog.dashboard.dashboard')
@section('title','Dashboard')
@section('content')
    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <h1 class="h2">Dashboard</h1>
        <div class="row my-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text fs-3">42</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Published</h5>
                        <p class="card-text fs-3">35</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Drafts</h5>
                        <p class="card-text fs-3">7</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
