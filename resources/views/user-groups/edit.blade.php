@extends('layouts.starter')
@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">Edit User Group</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('user-groups.update', $userGroup) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Group Name</label>
                <input type="text" name="name" class="form-control" value="{{ $userGroup->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
