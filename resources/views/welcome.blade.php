<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Aims Subscription - Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #fff;
    }
    .navbar-brand {
      font-weight: 700;
      color: #b81515 !important;
    }
    .hero {
  background: url('https://images.unsplash.com/photo-1580894894513-1996a0873b11?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') no-repeat center center;
  background-size: cover;
  position: relative;
  color: white;
  padding: 150px 0;
}

    
    .hero::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(to right, rgba(184, 21, 21, 0.8), rgba(0, 0, 0, 0.8));
    }
    .hero .container {
      position: relative;
      z-index: 2;
    }
    .btn-primary {
      background-color: #b81515;
      border: none;
    }
    .btn-primary:hover {
      background-color: #931010;
    }
    .btn-light:hover {
      background-color: #b81515;
      color: #fff;
    }
    .feature-card {
      transition: 0.3s ease-in-out;
      border: none;
    }
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    }
    footer {
      background-color: #fff;
      border-top: 1px solid #dee2e6;
      color: #6c757d;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="shadow-sm navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Aims Subscription</a>
      <div>
        <a href="{{ route('login') }}" class="btn btn-outline-dark me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="text-center hero">
    <div class="container">
      <h1 class="display-4 fw-bold">Welcome to Aims Subscription</h1>
      <p class="mt-3 lead">Easily manage and track your subscriptions. Stay in control. Always.</p>
      <a href="{{ route('register') }}" class="mt-4 btn btn-light btn-lg">Start for Free</a>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-5 text-center fw-bold">Why Choose Us?</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="text-center shadow-sm card feature-card h-100">
            <div class="card-body">
              <div class="mb-3 display-4 text-danger"><i class="fas fa-list-alt"></i></div>
              <h5 class="card-title fw-bold">Track Subscriptions</h5>
              <p class="card-text text-muted">Monitor all your active and upcoming subscriptions in one simple dashboard.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center shadow-sm card feature-card h-100">
            <div class="card-body">
              <div class="mb-3 display-4 text-danger"><i class="fas fa-bell"></i></div>
              <h5 class="card-title fw-bold">Automated Alerts</h5>
              <p class="card-text text-muted">Get notified before renewals. Avoid unwanted charges and stay informed.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center shadow-sm card feature-card h-100">
            <div class="card-body">
              <div class="mb-3 display-4 text-danger"><i class="fas fa-lock"></i></div>
              <h5 class="card-title fw-bold">Secure & Reliable</h5>
              <p class="card-text text-muted">We use modern security standards to ensure your data is protected at all times.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-5 text-center">
    <div class="container">
      <div class="px-4 py-5 text-white border-0 shadow-lg card bg-danger">
        <h2 class="mb-3 fw-bold">Simplify Your Subscription Life</h2>
        <p class="fs-5">Join hundreds of users already in control with Aims Subscription.</p>
        <a href="{{ route('register') }}" class="mt-3 btn btn-light btn-lg">Get Started Now</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 text-center">
    <p class="mb-0">&copy; {{ date('Y') }} Aims Subscription. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
</body>
</html>
