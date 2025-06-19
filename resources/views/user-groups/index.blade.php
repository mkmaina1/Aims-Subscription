{{-- @extends('layouts.starter')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">User Groups</h5>
        <a href="{{ route('user-groups.create') }}" class="btn btn-sm btn-primary">Add Group</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead><tr><th>Name</th>
            <th>slug</th>
            <th>permission</th>
            {{-- <th>entitystatus</th> --}}
            {{-- <th>Actions</th></tr></thead>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->slug }}</td>
                    <td>{{ $group->permission }}</td>
                    {{-- <td>{{ $group->entityStatuses }}</td> --}}
                    {{-- <td>
                        <a href="{{ route('user-groups.edit', $group) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('user-groups.destroy', $group) }}" method="POST" class="d-inline">
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
@endsection --}} 

@extends('layouts.starter')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">User  Groups</h5>
        <a href="{{ route('user-groups.create') }}" class="btn btn-sm btn-primary">Add Group</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Entity Status</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->slug }}</td>
                    <td>{{ $group->entityStatus->name }}</td> <!-- Displaying entity status -->
                    <td>
                        @if($group->permissions)
                            <ul>
                                @foreach($group->permissions as $permission)
                                    <li>{{ $permission }}</li>
                                @endforeach
                            </ul>
                        @else
                            No permissions assigned.
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user-groups.edit', $group) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('user-groups.destroy', $group) }}" method="POST" class="d-inline">
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