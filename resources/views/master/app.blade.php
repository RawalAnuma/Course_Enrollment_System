<!DOCTYPE html>
<html lang="en">
@include('master.header.index')

<body>

<div class="d-flex">

    @include('master.header.sidebar')

    </div>

    <!-- Main -->
    <div class="content flex-grow-1">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light bg-light border-bottom">

            <div class="container-fluid">

                <span class="navbar-brand">@yield('page_header', 'Dashboard')</span>

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> Admin
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person"></i> Profile
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </a>
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>

        </nav>

        <!-- Main Content -->
        @yield('content')
    </div>
</div>

@include('master.footer.index')
</body>
</html>