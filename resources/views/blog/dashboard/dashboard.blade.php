<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog Admin</a>
        <div class="d-flex">
          <a href="admin-login.html" class="btn btn-outline-light btn-sm"
            >Logout</a
          >
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-dark vh-100 sidebar py-4">
          <div class="position-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#"> Dashboard </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add-post.html"> Add Post </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> Manage Posts </a>
              </li>
            </ul>
          </div>
        </nav>

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
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
