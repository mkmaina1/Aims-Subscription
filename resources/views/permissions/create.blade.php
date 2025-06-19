@extends('layouts.starter')

@section('content')
<div class="container">
  <div class="mb-3">
    <h4 class="fw-bold">Create Permission</h4>
    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('permissions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Permission Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="permission_group" class="form-label">Role</label>
            <select name="permission_group" class="form-control" required>
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ isset($permission) && $permission->permission_group == $role->name ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-danger"><i class="fas fa-save me-1"></i> Save</button>
      </form>
    </div>
  </div>
</div>
@endsection
