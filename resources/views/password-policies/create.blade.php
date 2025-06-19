@extends('layouts.starter')
@section('content')

<form action="{{ route('password-policies.store') }}" method="POST">
  @csrf

  <div class="row">
    @foreach([
      'min_length' => 'Password Length',
      'require_uppercase' => 'Min Uppercase Letters',
      'require_number' => 'Min Numeric',
      'require_special' => 'Min Special Characters',
      'expiry_days' => 'Expiry Days',
      'start_warning_days' => 'Start Warning Days',
      'max_login_attempts' => 'Max Login Attempts',
      'lockout_duration' => 'Lockout Duration (minutes)',
      'otp_expiry_duration' => 'OTP Expiry Duration (minutes)',
      'inactive_days' => 'Inactive Days',
      'session_lifetime' => 'Session Lifetime (minutes)',
      'password_reuse_limit' => 'Password Reuse Limit',
      'max_partial_lockouts' => 'Max Partial Lockouts Allowed',
      'password_reuse_time_limit' => 'Password Reuse Time Limit'
    ] as $name => $label)
    <div class="col-md-6 mb-3">
      <label>{{ $label }}</label>
      <input type="number" class="form-control" name="{{ $name }}" required>
    </div>
    @endforeach

    <div class="col-md-6 mb-3">
      <label>Alphanumeric</label>
      <select name="alphanumeric" class="form-control">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Use OTP</label>
      <select name="use_otp" class="form-control">
        <option value="0">Disabled</option>
        <option value="1">Enabled</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Password Reuse Time Period</label>
      <select name="password_reuse_time_period" class="form-control">
        <option value="days">Days</option>
        <option value="weeks">Weeks</option>
        <option value="months" selected>Months</option>
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
