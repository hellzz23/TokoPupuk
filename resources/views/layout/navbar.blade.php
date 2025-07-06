<!-- Navbar Start -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>

  <!-- Search Form -->
<form action="{{ route('pupuk.index') }}" method="GET" class="d-none d-md-flex ms-4" style="width: 350px;">
    <input
        type="search"
        name="search"
        class="form-control border border-success"
        placeholder="Cari judul pupuk..."
        value="{{ request('search') }}"
    >
</form>


    <!-- Right Side -->
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Settings</span>
            </a>

            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('login.keluar') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</nav>
<!-- Navbar End -->