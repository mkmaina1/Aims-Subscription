<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Aims Subscription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- AdminLTE CSS -->
  <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto flex-row align-items-center gap-3">

      <!-- Notifications -->

      <li class="nav-item d-none d-sm-inline-block">
  <a href="{{ route('subscriptions.index') }}" class="nav-link">Subscriptions</a>
</li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-bs-toggle="dropdown">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg">
          <span class="dropdown-header">3 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope me-2"></i> 1 new message
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users me-2"></i> 2 new user signups
          </a>
        </div>
      </li>

      <!-- Profile Dropdown -->
      <li class="nav-item dropdown">
        <a id="userDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
          <i class="far fa-user-circle"></i> {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="{{ route('profile.edit') }}">
            <i class="fas fa-user me-2"></i> Profile
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
              <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="text-center brand-link">
      <span class="brand-text font-weight-light">Aims Admin</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
          <!-- User Management -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>User Management<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview ps-3">
              <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link"><p>Roles</p></a></li>
              <li class="nav-item"><a href="{{ route('user-groups.index') }}" class="nav-link"><p>User Groups</p></a></li>
              <li class="nav-item"><a href="{{ route('permissions.index') }}" class="nav-link"><p> Permissions</p></a></li>
               <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link"><p>Users</p></a></li>
              <li class="nav-item"><a href="{{ route('password-policies.index') }}" class="nav-link"><p>Password Policies</p></a></li>
            </ul>
          </li>

          <!-- Logout Button -->
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="nav-link bg-transparent border-0 text-start w-100 text-white">
                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                <p>Logout</p>
              </button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="content-wrapper p-3">

    {{-- ✅ Flash success message globally --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-alert">
        {{ session('success') }}
      </div>
    @endif

    {{-- Content area --}}
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="text-sm text-center main-footer">
    <strong>&copy; {{ date('Y') }} Aims Subscription</strong>. All rights reserved.
  </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Auto-dismiss flash alert -->
<script>
  setTimeout(function () {
    const alert = document.getElementById('flash-alert');
    if (alert) {
      alert.classList.remove('show');
      alert.classList.add('fade');
      alert.style.opacity = 0;
    }
  }, 3000); // 3 seconds
</script>

</body>
</html>
