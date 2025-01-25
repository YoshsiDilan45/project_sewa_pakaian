<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route ('admin.index') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">SEWA PAKAIAN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('back-end/img/prof.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">User Login</h6>
                        <span>{{ $title }}</span>
                    </div>
                </div>
                @if ($title === 'Admin')
                <!-- Menu Start -->
                <div class="navbar-nav w-100">
                <a href="{{ route('admin.index') }}" class="nav-item nav-link @if(request()->routeIs('admin.index')) active @endif">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="{{ route('payment_method.index') }}" class="nav-item nav-link @if(request()->routeIs('payment_method.index')) active @endif">
                    <i class="fa fa-credit-card me-2"></i>Payment Method
                </a>
                <a href="{{ route('clothes.index') }}" class="nav-item nav-link @if(request()->routeIs('clothes.index')) active @endif">
                    <i class="fa fa-tshirt me-2"></i>Clothes
                </a>
                    <a href="{{ route('orders.index') }}" class="nav-item nav-link @if(request()->routeIs('orders.index')) active @endif"><i class="fa fa-cart-plus me-2"></i>Orders</a>


                    <!-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
                </div>
                <!-- Menu End -->
                 @elseif ($title === 'Courier')
                 <!-- Menu Start -->
                <div class="navbar-nav w-100">
                    <a href="./courier" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="./courier" class="nav-item nav-link"><i class="fa fa-shipping-fast me-2"></i>Shipping</a>
                <!-- Menu End -->
            @else
                <!-- Menu Start -->
                <div class="navbar-nav w-100">
                    <a href="./owner" class="nav-item nav-link active"><i class="fa fa-torii me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Reports</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signup.html" class="dropdown-item">Clothes</a>
                            <a href="404.html" class="dropdown-item">Ordes</a>
                            <a href="blank.html" class="dropdown-item">Shipping</a>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->
                @endif
            </nav>
        </div>
        <!-- Sidebar End -->
<!-- Mobile Version -->

        