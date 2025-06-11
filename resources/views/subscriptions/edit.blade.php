@extends('layouts.starter')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Edit Subscription</h5></div>
        <div class="card-body">
            <form action="{{ route('subscriptions.update', $subscription) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Plan Name</label>
                    <select name="plan_name" class="form-select" required>
                        <option value="Basic" {{ $subscription->plan_name === 'Basic' ? 'selected' : '' }}>Basic</option>
                        <option value="Standard" {{ $subscription->plan_name === 'Standard' ? 'selected' : '' }}>Standard</option>
                        <option value="Premium" {{ $subscription->plan_name === 'Premium' ? 'selected' : '' }}>Premium</option>
                    </select>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" value="{{ $subscription->start_date }}" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Renewal Date</label>
                        <input type="date" name="renewal_date" value="{{ $subscription->renewal_date }}" class="form-control">
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="auto_renew" value="1" {{ $subscription->auto_renew ? 'checked' : '' }}>
                    <label class="form-check-label">Auto Renew</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Replace Invoice (optional)</label>
                    <input type="file" name="invoice" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger">Update Subscription</button>
            </form>
        </div>
    </div>
</div>
@endsection
