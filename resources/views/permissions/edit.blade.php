@extends('layouts.starter')

@section('content')
<div class="container">
  <div class="mb-3">
    <h4 class="fw-bold">Edit Permission</h4>
    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Permission Name</label>
          <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
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

        {{-- <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Permission Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $permission->name) }}" required>
    </div>

    <div class="form-group">
        <label for="permission_group">Permission Group</label>
        <input type="text" name="permission_group" id="permission_group" class="form-control" value="{{ old('permission_group', $permission->permission_group) }}" required>
    </div>

    <div class="form-group">
        <label for="roles">Assign Roles</label>
        @foreach ($roles as $role)
            <div class="form-check">
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="role_{{ $role->id }}" class="form-check-input" 
                {{ in_array($role->id, $currentRoles) ? 'checked' : '' }}>
                <label for="role_{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Update Permission</button>
</form> --}}



        <button type="submit" class="btn btn-warning"><i class="fas fa-sync me-1"></i> Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
