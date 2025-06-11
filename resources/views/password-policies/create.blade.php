@extends('layouts.starter')
@section('content')

<div class="card">
  <div class="card-header"><h5 class="mb-0">Add Password Policy</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('password-policies.store') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Minimum Length</label>
        <input type="number" name="min_length" class="form-control" required>
      </div>
      <div class="form-check">
        <input type="checkbox" name="require_uppercase" class="form-check-input" value="1">
        <label class="form-check-label">Require Uppercase</label>
      </div>
      <div class="form-check">
        <input type="checkbox" name="require_number" class="form-check-input" value="1">
        <label class="form-check-label">Require Number</label>
      </div>
      <div class="form-check">
        <input type="checkbox" name="require_special" class="form-check-input" value="1">
        <label class="form-check-label">Require Special Character</label>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
  </div>
</div>
@endsection
