@extends('layouts.starter')
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="mb-0">Edit Password Policy</h5>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('password-policies.update', $passwordPolicy) }}">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Minimum Length</label>
          <input type="number" name="min_length" class="form-control" value="{{ $passwordPolicy->min_length }}" required>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Password Expiry (Days)</label>
          <input type="number" name="expiry_days" class="form-control" value="{{ $passwordPolicy->expiry_days }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Warning Start (Days Before Expiry)</label>
          <input type="number" name="start_warning_days" class="form-control" value="{{ $passwordPolicy->start_warning_days }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Max Login Attempts</label>
          <input type="number" name="max_login_attempts" class="form-control" value="{{ $passwordPolicy->max_login_attempts }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Lockout Duration (Minutes)</label>
          <input type="number" name="lockout_duration" class="form-control" value="{{ $passwordPolicy->lockout_duration }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Session Lifetime (Minutes)</label>
          <input type="number" name="session_lifetime" class="form-control" value="{{ $passwordPolicy->session_lifetime }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Password Reuse Limit</label>
          <input type="number" name="password_reuse_limit" class="form-control" value="{{ $passwordPolicy->password_reuse_limit }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Reuse Time Limit</label>
          <input type="number" name="password_reuse_time_limit" class="form-control" value="{{ $passwordPolicy->password_reuse_time_limit }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Reuse Time Period</label>
          <select name="password_reuse_time_period" class="form-control">
            <option value="days" {{ $passwordPolicy->password_reuse_time_period === 'days' ? 'selected' : '' }}>Days</option>
            <option value="weeks" {{ $passwordPolicy->password_reuse_time_period === 'weeks' ? 'selected' : '' }}>Weeks</option>
            <option value="months" {{ $passwordPolicy->password_reuse_time_period === 'months' ? 'selected' : '' }}>Months</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Max Partial Lockouts</label>
          <input type="number" name="max_partial_lockouts" class="form-control" value="{{ $passwordPolicy->max_partial_lockouts }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Inactive Days Limit</label>
          <input type="number" name="inactive_days" class="form-control" value="{{ $passwordPolicy->inactive_days }}">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">OTP Expiry (Minutes)</label>
          <input type="number" name="otp_expiry_duration" class="form-control" value="{{ $passwordPolicy->otp_expiry_duration }}">
        </div>

        {{-- Checkboxes --}}
        <div class="col-md-12 mt-4">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="require_uppercase" value="1" {{ $passwordPolicy->require_uppercase ? 'checked' : '' }}>
            <label class="form-check-label">Require Uppercase</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="require_number" value="1" {{ $passwordPolicy->require_number ? 'checked' : '' }}>
            <label class="form-check-label">Require Number</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="require_special" value="1" {{ $passwordPolicy->require_special ? 'checked' : '' }}>
            <label class="form-check-label">Require Special Characters</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="alphanumeric" value="1" {{ $passwordPolicy->alphanumeric ? 'checked' : '' }}>
            <label class="form-check-label">Alphanumeric Only</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="use_otp" value="1" {{ $passwordPolicy->use_otp ? 'checked' : '' }}>
            <label class="form-check-label">Use OTP</label>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-success mt-4">Update Policy</button>
    </form>
  </div>
</div>

@endsection
