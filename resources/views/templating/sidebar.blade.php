<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link  {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
             @if (auth()->user()->role == 'admin')
                
           
            <a class="nav-link {{ Route::is('fakultas') ? 'active' : '' }}" href="{{ route('fakultas') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Fakultas
            </a>
            <a class="nav-link {{ Route::is('jurusan') ? 'active' : '' }}" href="{{ route('jurusan') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Jurusan
            </a>
            <a class="nav-link {{ Route::is('iuran') ? 'active' : '' }}" href="{{ route('iuran') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                setting kas
            </a>
            @endif
            <a class="nav-link {{ Route::is('listlatihan') ? 'active' : '' }}" href="{{ route('listlatihan') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                List Anggota ikut latihan
            </a>
            @if (auth()->user()->role == 'admin')
                
            <a class="nav-link {{ Route::is('pembayaran') ? 'active' : '' }}" href="{{ route('pembayaran') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Pembayaran
            </a>
            @endif
            <a class="nav-link {{ Route::is('anggota') ? 'active' : '' }}" href="{{ route('anggota') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Data Anggota
            </a>
            
            
          
           
            
           
            
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>