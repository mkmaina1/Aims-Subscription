<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - Aims Subscription</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styling -->
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1584438784894-089d6f62b8d2?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
    }
    .overlay {
      background-color: rgba(0, 0, 0, 0.65);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }
    .register-box {
      background: #fff;
      border-radius: 10px;
      padding: 2rem;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }
    .register-box h2 {
      color: #b81515;
    }
    .btn-danger {
      background-color: #b81515;
      border: none;
    }
    .btn-danger:hover {
      background-color: #931010;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <div class="register-box">
      <h2 class="mb-4 text-center fw-bold">Create Your Account</h2>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input id="name" type="text" name="name" value="{{ old('name') }}"
                 class="form-control @error('name') is-invalid @enderror" required autofocus>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}"
                 class="form-control @error('email') is-invalid @enderror" required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input id="password" type="password" name="password"
                 class="form-control @error('password') is-invalid @enderror" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input id="password_confirmation" type="password" name="password_confirmation"
                 class="form-control @error('password_confirmation') is-invalid @enderror" required>
          @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <a href="{{ route('login') }}" class="text-decoration-none">Already registered?</a>
          <button type="submit" class="btn btn-danger px-4">Register</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
