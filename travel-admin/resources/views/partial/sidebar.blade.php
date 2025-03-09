<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/" data-link="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Travel Information</div>

    <!-- Nav Item - Travel Schedule -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('schedules.index') }}" data-link="/data_schedule">
            <i class="fas fa-fw fa-car"></i>
            <span>Travel Schedule</span>
        </a>
    </li>

    <!-- Nav Item - Booking History -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bookings.index') }}" data-link="/passenger_info">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Booking History</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('payments.index') }}" data-link="/payment_info">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Payment History</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Addons</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('reports.index') }}" data-link="/payment_info">
            <i class="fas fa-fw fa-folder"></i>
            <span>Report</span>
        </a>
    </li>



    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPath = window.location.pathname; // Ambil path dari URL
        let menuItems = document.querySelectorAll(".nav-item a");

        menuItems.forEach(item => {
            if (item.getAttribute("data-link") === currentPath) {
                item.closest(".nav-item").classList.add("active");
            }
        });
    });
</script>
