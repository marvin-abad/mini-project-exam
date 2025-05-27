@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}

    </div>
@endif

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Employee List</h2>
                            <p>Here you can view and manage employee records.</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">Add New Employee</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Gender</th>
                                        <th>Salary</th>
                                        <th>Actions</th>
                                    <tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }} </td>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', ['employee' => $employee]) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('employees.destroy', ['employee' => $employee]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <input class="btn btn-danger" type="submit" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4">
                                {{ $employees->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
