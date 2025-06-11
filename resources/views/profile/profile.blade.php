@extends('layouts.starter')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">My Profile</h4>
                    <a href="#" class="btn btn-sm btn-light">Edit</a>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=dc3545&color=fff&size=128" class="rounded-circle img-thumbnail" alt="Profile Image">
                        </div>
                        <div class="col-md-8">
                            <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-1"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p class="text-muted mb-1"><strong>Role:</strong> {{ Auth::user()->role ?? 'N/A' }}</p>
                            <p class="text-muted mb-0"><strong>Member Since:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <hr>

                    <h6 class="text-uppercase fw-bold text-muted">Security</h6>
                    <p class="text-muted">To change your password or update security settings, please contact your administrator or use the password policy page if available.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
