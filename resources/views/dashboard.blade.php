@extends('layouts.starter')

@section('content')
<div class="container-fluid">
  <!-- Banner -->
  <div class="mb-4 text-white shadow-sm card bg-danger">
    <div class="card-body d-flex justify-content-between align-items-center">
      <div>
        <h3>Welcome, {{ Auth::user()->name }}</h3>
        <p>Aims Subscription Overview</p>
        @if(auth()->user()->role === 'admin')
    <a href="{{ route('users.index') }}" class="btn btn-danger">Manage Users</a>
@endif

      </div>
      <a href="{{ route('subscriptions.create') }}" class="btn btn-light">New Subscription</a>
    </div>
  </div>

  <!-- Metrics -->
  <div class="mb-4 row g-4">
    @php
      $stats = [
        ['title' => 'Total Users', 'count' => 120, 'icon' => 'users', 'color' => 'info'],
        ['title' => 'Roles', 'count' => 5, 'icon' => 'shield-alt', 'color' => 'warning'],
        ['title' => 'Groups', 'count' => 8, 'icon' => 'layer-group', 'color' => 'primary'],
        ['title' => 'Policies', 'count' => 3, 'icon' => 'lock', 'color' => 'success'],
      ];

      // Example dynamic values (you'll replace these with real counts)
      $subscriptionStats = [
        'total' => 42,
        'expired' => 5,
        'renewing_soon' => 3,
      ];
    @endphp

    @foreach($stats as $stat)
      <div class="col-md-3">
        <div class="border-0 shadow-sm card card-lift h-100">
          <div class="text-center card-body">
            <div class="mb-2 text-{{ $stat['color'] }}">
              <i class="fas fa-{{ $stat['icon'] }} fa-2x"></i>
            </div>
            <h5 class="fw-bold">{{ $stat['title'] }}</h5>
            <h3>{{ $stat['count'] }}</h3>
          </div>
        </div>
      </div>
    @endforeach

    <!-- ✅ Subscriptions Card -->
    <div class="col-md-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body text-center">
          <div class="text-danger mb-3">
            <i class="fas fa-stream fa-2x"></i>
          </div>
          <h5 class="fw-bold">Subscriptions</h5>
          <h3 class="fw-bold">{{ $subscriptionStats['total'] }}</h3>
          <div class="mt-2">
            <span class="badge bg-warning text-dark me-2">Renewing Soon: {{ $subscriptionStats['renewing_soon'] }}</span>
            <span class="badge bg-danger">Expired: {{ $subscriptionStats['expired'] }}</span>
          </div>
          <a href="{{ route('subscriptions.index') }}" class="btn btn-outline-danger btn-sm mt-3">Manage</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Activity Placeholder -->
  <div class="border-0 shadow-sm card">
    <div class="card-header fw-bold">Recent Activity</div>
    <div class="card-body">
      <ul class="mb-0 list-unstyled">
        <li><i class="fas fa-user text-success me-2"></i> New Director account created</li>
        <li><i class="fas fa-shield-alt text-warning me-2"></i> Role "Manager" updated</li>
        <li><i class="fas fa-lock text-danger me-2"></i> Password policy changed</li>
      </ul>
    </div>
  </div>
</div>
@endsection
