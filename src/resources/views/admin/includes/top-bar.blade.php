<!-- Top Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <div class="d-flex align-items-center flex-grow-1">
            <button class="btn btn-light border-0 me-2" id="sidebarToggle">
                <i class="bi bi-list fs-4"></i>
            </button>
            <!-- Search for Menu Filtering (Hidden on Mobile) -->
            <div class="input-group w-auto me-3 d-none d-md-flex" style="max-width: 400px; flex-grow: 1;">
                <span class="input-group-text bg-light border-end-0 border rounded-start-3">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="search" id="topMenuSearch"
                    class="form-control bg-light border-start-0 border rounded-end-3" placeholder="Filter menu..."
                    aria-label="Search">
            </div>
        </div>

        <!-- Right Side Icons -->
        <ul class="navbar-nav ms-auto flex-row align-items-center">
            <!-- Notification Dropdown -->
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative p-2 rounded-circle hover-bg-light" href="#"
                    id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell fs-5 text-muted"></i>
                    <span
                        class="position-absolute top-0 start-75 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2 p-0 notification-dropdown-menu"
                    aria-labelledby="notificationDropdown">
                    <li
                        class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light rounded-top">
                        <h6 class="mb-0 fw-bold">Notifications</h6>
                        <span class="badge bg-primary rounded-pill">4 New</span>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-start gap-3 p-3 border-bottom notification-item"
                            href="#">
                            <div class="bg-primary-light text-primary rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; flex-shrink: 0;">
                                <i class="bi bi-cart-fill"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold small text-dark">New Order Received</p>
                                <p class="mb-0 text-muted" style="font-size: 0.75rem;">Order #SK2540 from
                                    Neal Matthews</p>
                                <small class="text-primary" style="font-size: 0.7rem;">2 min ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-start gap-3 p-3 border-bottom notification-item"
                            href="#">
                            <div class="bg-success-light text-success rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; flex-shrink: 0;">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold small text-dark">New User Registered</p>
                                <p class="mb-0 text-muted" style="font-size: 0.75rem;">Jane Doe created an
                                    account</p>
                                <small class="text-muted" style="font-size: 0.7rem;">1 hr ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-start gap-3 p-3 border-bottom notification-item"
                            href="#">
                            <div class="bg-warning-light text-warning rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; flex-shrink: 0;">
                                <i class="bi bi-hdd-stack-fill"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold small text-dark">System Alert</p>
                                <p class="mb-0 text-muted" style="font-size: 0.75rem;">High memory usage
                                    detected (90%)</p>
                                <small class="text-muted" style="font-size: 0.7rem;">5 hrs ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-start gap-3 p-3 border-bottom notification-item"
                            href="#">
                            <div class="bg-danger-light text-danger rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; flex-shrink: 0;">
                                <i class="bi bi-shield-exclamation"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold small text-dark">Security Warning</p>
                                <p class="mb-0 text-muted" style="font-size: 0.75rem;">Failed login
                                    attempt
                                    from IP 192.168.1.1</p>
                                <small class="text-muted" style="font-size: 0.7rem;">1 day ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-center small p-2 fw-semibold text-primary bg-light rounded-bottom"
                            href="#">
                            View All Notifications
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Profile Dropdown: Visible ONLY on Desktop (lg and up) -->
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="text-end lh-1">
                        <div class="fw-semibold small text-dark">Alex Morgan</div>
                        <div class="text-muted" style="font-size: 11px;">Administrator</div>
                    </div>
                    <img src="{{ asset('vendor/enotification/assets/images/avator.jpg') }}" alt="avatar"
                        class="rounded-circle" width="38" height="38">
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2 p-2"
                    aria-labelledby="navbarDropdown" style="min-width: 200px;">
                    <a class="dropdown-item rounded py-2" href="#"><i class="bi bi-person me-2"></i>
                        Profile</a>
                    <a class="dropdown-item rounded py-2" href="#"><i class="bi bi-gear me-2"></i>
                        Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item rounded py-2 text-danger" href="#"><i
                            class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
