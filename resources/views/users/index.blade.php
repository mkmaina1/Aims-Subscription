@extends('layouts.starter')

@section('content')
<div class="container-fluid">
  <div class="mb-3 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold">User List</h4>
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-user-plus me-1"></i> Add User</a>
  </div>

  <div class="card shadow-sm border-0">
    <div class="card-body table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User Group</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->userGroup ? $user->userGroup->name : 'N/A' }}</td>  <!-- Changed this line -->
            <td>
              <span class="badge bg-success">Active</span>
            </td>
            <td>
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr><td colspan="5" class="text-center text-muted">No users found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
