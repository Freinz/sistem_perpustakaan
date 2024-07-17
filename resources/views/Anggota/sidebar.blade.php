<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/dashboard" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ URL::asset('image/poliban.png') }}" class="img-fluid w-25" alt="logo image">
                <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version"></span>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                @include('anggota.menu-list')
            </ul>
            <div class="card nav-action-card bg-brand-color-4">
              
            </div>
        </div>
       
            </div>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
