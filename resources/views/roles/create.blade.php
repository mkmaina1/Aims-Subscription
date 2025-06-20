@extends('layouts.starter')
@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">Add Role</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection