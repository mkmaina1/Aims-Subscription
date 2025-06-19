@extends('layouts.starter')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="mb-0">Password Policies</h5>
</div>

@foreach($policies as $policy)
<div class="card mb-4">
  <div class="card-header">
    <strong>Password Policy {{ $policy->id }}</strong>
  </div>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong>Min Length:</strong> {{ $policy->min_length }}</li>
      <li class="list-group-item"><strong>Require Uppercase:</strong> {{ $policy->require_uppercase ? 'Yes' : 'No' }}</li>
      <li class="list-group-item"><strong>Require Number:</strong> {{ $policy->require_number ? 'Yes' : 'No' }}</li>
      <li class="list-group-item"><strong>Require Special Character:</strong> {{ $policy->require_special ? 'Yes' : 'No' }}</li>
      <li class="list-group-item"><strong>Alphanumeric:</strong> {{ $policy->alphanumeric ? 'Yes' : 'No' }}</li>
      <li class="list-group-item"><strong>Expiry (days):</strong> {{ $policy->expiry_days }}</li>
      <li class="list-group-item"><strong>Warning Start (days):</strong> {{ $policy->start_warning_days }}</li>
      <li class="list-group-item"><strong>Max Login Attempts:</strong> {{ $policy->max_login_attempts }}</li>
      <li class="list-group-item"><strong>Lockout Duration (mins):</strong> {{ $policy->lockout_duration }}</li>
      <li class="list-group-item"><strong>Use OTP:</strong> {{ $policy->use_otp ? 'Yes' : 'No' }}</li>
      <li class="list-group-item"><strong>OTP Expiry (mins):</strong> {{ $policy->otp_expiry_duration }}</li>
      <li class="list-group-item"><strong>Inactive Days:</strong> {{ $policy->inactive_days }}</li>
      <li class="list-group-item"><strong>Session Lifetime (mins):</strong> {{ $policy->session_lifetime }}</li>
      <li class="list-group-item"><strong>Password Reuse Limit:</strong> {{ $policy->password_reuse_limit }}</li>
      <li class="list-group-item"><strong>Max Partial Lockouts:</strong> {{ $policy->max_partial_lockouts }}</li>
      <li class="list-group-item"><strong>Reuse Time Limit:</strong> {{ $policy->password_reuse_time_limit }}</li>
      <li class="list-group-item"><strong>Reuse Time Period:</strong> {{ ucfirst($policy->password_reuse_time_period) }}</li>
    </ul>

    <div class="mt-3">
      <a href="{{ route('password-policies.edit', $policy) }}" class="btn btn-warning btn-sm">Edit</a>
    </div>
  </div>
</div>
@endforeach
@endsection
