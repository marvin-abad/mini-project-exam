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

                        <div class="col-md-6">
                            <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employee</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="card border-0">
                            <div class="card-header border-0">{{ __('Employee Summary') }}</div>
                            <div class="card-body row gap-2">
                                <div class="card col-md-3 p-4"><h4>Male Employees:</h4> <span class="fs-3 fw-bold text-primary">{{ $maleCount }}</div>
                                <div class="card col-md-3 p-4"><h4>Female Employees:</h4> <span class="fs-3 fw-bold text-primary">{{ $femaleCount }}</div>
                                <div class="card col-md-3 p-4"><h4>Total Employees:</h4> <span class="fs-3 fw-bold text-primary">{{ $employees->count() }}</div>
                                <div class="card col-md-3 p-4"><h4>Average Age of Employees:</h4> <span class="fs-3 fw-bold text-primary">{{ $averageAge }} yrs old</div>
                                <div class="card col-md-3 p-4"><h4>Total Monthly Salary of All Employees:</h4> <span class="fs-3 fw-bold text-primary">₱{{ $totalSalary }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
