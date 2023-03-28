
@if (Auth::user() == True)
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-shopping-cart"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Aplikasi Penjualan</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-sitemap"></i>
        <span>Product</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/product">Daftar Product</a>
            @can('create product', Product::class)
            <a class="collapse-item" href="/product/create">Tambah Product</a>
            @endcan
            @can('scan product for add stock', Product::class)
            <a class="collapse-item" href="/product/update/stok">Tambah Stok</a>
            @endcan
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
@can('make transaction', Product::class)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-money-bill"></i>
        <span>Transaksi</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/penjualan/create">Tambah Penjualan</a>
        </div>
    </div>
</li>
@endcan

<!-- Divider -->
<hr class="sidebar-divider">





</ul>
<!-- End of Sidebar -->
@else
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
</ul>
@endif