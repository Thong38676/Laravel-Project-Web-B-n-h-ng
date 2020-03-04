<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-users-cog"  style="font-size: 40px"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PVT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route("brand.index")}}">
            <i class="far fa-address-book" style="font-size: 25px"></i>
            <span>Brand</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{route("category.index")}}">
            <i class="fas fa-list-alt" style="font-size: 25px"></i>
            <span>Category</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{route("customer.index")}}">
            <i class="fas fa-user-friends" style="font-size: 25px"></i>
            <span>Customer</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{route("product.index")}}">
            <i class="fas fa-laptop" style="font-size: 25px"></i>
            <span>Product</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{route("order.index")}}">
            <i class="fas fa-truck" style="font-size: 25px"></i>
            <span>Order</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">

    </div>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
