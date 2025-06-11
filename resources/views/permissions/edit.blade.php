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
          <label for="slug" class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control" value="{{ $permission->slug }}" required>
        </div>

        <div class="mb-3">
          <label for="permission_group" class="form-label">Permission Group</label>
          <input type="text" name="permission_group" class="form-control" value="{{ $permission->permission_group }}" required>
        </div>

        <button type="submit" class="btn btn-warning"><i class="fas fa-sync me-1"></i> Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
