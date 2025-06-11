@extends('layouts.starter')

@section('content')
<div class="container">
  <h4 class="mb-3 fw-bold">Edit User</h4>

  <div class="card shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">User Group</label>
          <select name="user_group_id" class="form-select">
            @foreach ($groups as $group)
              <option value="{{ $group->id }}" {{ $user->user_group_id == $group->id ? 'selected' : '' }}>
                {{ $group->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Password (leave blank to keep)</label>
          <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning"><i class="fas fa-sync me-1"></i> Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
