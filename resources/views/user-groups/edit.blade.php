@extends('layouts.starter')

@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">Edit User Group</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('user-groups.update', $userGroup) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Group Name</label>
                <input type="text" name="name" class="form-control" value="{{ $userGroup->name }}" required>
            </div>
            <div class="mb-3">
                <label for="entity_status_id" class="form-label">Entity Status</label>
                <select name="entity_status_id" class="form-control" required>
                    @foreach ($entityStatuses as $status)
                        <option value="{{ $status->id }}" {{ $userGroup->entity_status_id == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="permissions" class="form-label">Permissions</label>
                <div>
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input
                                type="checkbox"
                                name="permissions[]"
                                class="form-check-input"
                                id="permission_{{ $permission->name }}"
                                value="{{ $permission->name }}"
                            >
                            <label class="form-check-label" for="permission_{{ $permission->name }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
