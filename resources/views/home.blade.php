@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Employee Dashboard</h2>
                            <p>Welcome to the employee dashboard. Here you can view your profile, manage tasks, and access company resources.</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        {{-- <div class="col-md-6">
                            <h3>Profile</h3>
                            <p>View and update your personal information.</p>
                            <a href="{{ route('profile.show') }}" class="btn btn-primary">View Profile</a>
                        </div> --}}
                        <div class="col-md-6">
                            <h3>Employee</h3>
                            <p>View and Manage employee</p>
                            <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employee</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
