@extends('layouts.starter')

@section('content')
<div class="container-fluid">
   

    <!-- Subscription Index -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Subscriptions</h5>
            <a href="{{ route('subscriptions.create') }}" class="btn btn-danger">Add Subscription</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Plan</th>
                        <th>Start Date</th>
                        <th>Renewal</th>
                        <th>Status</th>
                        <th>Auto Renew</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $sub)
                    <tr>
                        <td>{{ $sub->plan_name }}</td>
                        <td>{{ $sub->start_date }}</td>
                        <td>{{ $sub->renewal_date ?? 'N/A' }}</td>
                        <td><span class="badge bg-{{ $sub->status === 'active' ? 'success' : ($sub->status === 'expired' ? 'warning' : 'danger') }}">{{ ucfirst($sub->status) }}</span></td>
                        <td>{{ $sub->auto_renew ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('subscriptions.edit', $sub) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('subscriptions.destroy', $sub) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this subscription?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



