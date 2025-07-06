<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3" style="background: linear-gradient(to bottom, #a5d6a7, #e8f5e9);">
    <nav class="navbar navbar-light">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3 d-flex align-items-center">
            <img src="{{ asset('assets/img/leaf.jpg') }}" alt="Logo" style="width: 30px; height: 30px;" class="me-2">
            <h4 class="text-success mb-0 fw-bold">Toko Pupuk</h4>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle shadow" src="{{ asset('assets/img/userrjpg.jpg') }}" alt="User" style="width: 45px; height: 45px; object-fit: cover;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-success fw-semibold">{{ auth()->user()->name }}</h6>
                <span class="text-muted small">{{ auth()->user()->role }}</span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link">
                <i class="fa fa-leaf me-2 text-success"></i>Dashboard
            </a>
            <a href="{{ route('pupuk.index') }}" class="nav-item nav-link">
                <i class="fa-solid fa-seedling me-2 text-success"></i>Daftar Pupuk
            </a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('pesanan.admin') }}" class="nav-item nav-link">
                    <i class="fa fa-box me-2 text-success"></i>Data Pesanan
                </a>
            @else
                <a href="{{ route('riwayat.pesanan') }}" class="nav-item nav-link">
                    <i class="fa fa-history me-2 text-success"></i>Riwayat Pesanan
                </a>
            @endif
            <a href="{{ route('about') }}" class="nav-item nav-link">
                <i class="fa fa-info-circle me-2 text-success"></i>About
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->