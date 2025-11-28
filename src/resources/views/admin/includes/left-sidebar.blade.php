<!-- Sidebar -->
<div id="sidebar-wrapper">
    <div class="sidebar-heading">
        <i class="bi bi-layers-fill"></i>
        <span>AdminPanel</span>
    </div>

    <!-- Sidebar Menu (Scrollable) -->
    <div class="list-group list-group-flush sidebar-menu" id="sidebarMenu">
        <!-- Main Navigation -->
        <div>
            <a href="#" class="list-group-item list-group-item-action active">
                <i class="bi bi-grid-1x2 me-3"></i> <span>Dashboard</span>
            </a>

            <!-- Submenu Example -->
            <a href="#ecommerceSubmenu" data-bs-toggle="collapse"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span><i class="bi bi-cart3 me-3"></i> E-Commerce</span>
                <i class="bi bi-chevron-down" style="font-size: 0.8rem;"></i>
            </a>
            <div class="collapse show" id="ecommerceSubmenu">
                <div class="sidebar-submenu list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">Products</a>
                    <a href="#" class="list-group-item list-group-item-action">Orders</a>
                    <a href="#" class="list-group-item list-group-item-action">Customers</a>
                </div>
            </div>

            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-people me-3"></i> <span>Users</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-file-text me-3"></i> <span>Documents</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-bar-chart me-3"></i> <span>Analytics</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-envelope me-3"></i> <span>Messages</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-calendar-event me-3"></i> <span>Calendar</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-shield-check me-3"></i> <span>Security</span>
            </a>
        </div>

        <!-- Bottom Settings & Mobile Profile -->
        <div class="mt-auto">
            <a href="#" class="list-group-item list-group-item-action">
                <i class="bi bi-gear me-3"></i> <span>Settings</span>
            </a>

            <!-- Mobile Only Profile Section -->
            <div class="d-lg-none border-top mt-2 pt-2 bg-light">
                <div class="px-3 py-2 d-flex align-items-center">
                    <img src="{{ asset('vendor/enotification/assets/images/avator.jpg') }}" alt="avatar"
                        class="rounded-circle me-2" width="32" height="32">
                    <div class="lh-1">
                        <div class="fw-bold small">Alex Morgan</div>
                        <div class="text-muted" style="font-size: 10px;">Administrator</div>
                    </div>
                </div>
                <a href="#" class="list-group-item list-group-item-action border-0 small py-2 bg-light">
                    <i class="bi bi-person me-3"></i> <span>My Profile</span>
                </a>
                <a href="#"
                    class="list-group-item list-group-item-action border-0 small py-2 text-danger bg-light">
                    <i class="bi bi-box-arrow-right me-3"></i> <span>Sign Out</span>
                </a>
            </div>
        </div>
    </div>
</div>
