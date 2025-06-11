@extends('layouts.starter')

@section('content')
<div class="container-fluid">
  <div class="mb-3 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold">Permissions</h4>
    <a href="{{ route('permissions.create') }}" class="btn btn-danger"><i class="fas fa-plus-circle me-1"></i> Add Permission</a>
  </div>

  <div class="card shadow-sm border-0">
    <div class="card-body table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Group</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($permissions as $permission)
          <tr>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->slug }}</td>
            <td>{{ $permission->permission_group }}</td>
            <td>
              <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-outline-warning me-1"><i class="fas fa-edit"></i></a>
              <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this permission?')">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr><td colspan="4" class="text-center text-muted">No permissions found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
