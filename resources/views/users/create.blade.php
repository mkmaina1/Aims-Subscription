@extends('layouts.starter')

@section('content')
<div class="container">
  <h4 class="mb-3 fw-bold">Add New User</h4>

  <div class="card shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">User Group</label>
          <select name="user_group_id" class="form-select">
            @foreach ($groups as $group)
              <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Save</button>
      </form>
    </div>
  </div>
</div>
@endsection
