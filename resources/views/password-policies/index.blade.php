@extends('layouts.starter')
@section('content')

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Password Policies</h5>
    <a href="{{ route('password-policies.create') }}" class="btn btn-sm btn-primary">Add Policy</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Min Length</th>
          <th>Uppercase</th>
          <th>Number</th>
          <th>Special Char</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($policies as $policy)
        <tr>
          <td>{{ $policy->min_length }}</td>
          <td>{{ $policy->require_uppercase ? 'Yes' : 'No' }}</td>
          <td>{{ $policy->require_number ? 'Yes' : 'No' }}</td>
          <td>{{ $policy->require_special ? 'Yes' : 'No' }}</td>
          <td>
            <a href="{{ route('password-policies.edit', $policy) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('password-policies.destroy', $policy) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection