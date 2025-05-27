@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary float-end">Back to Employee List</a>
                </div>

                <form action={{ route('employees.update', ['employee' => $employee]) }}  method="post" class="card-body">
                    @csrf
                    @method('put')
                    <div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value={{ $employee -> first_name }} required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value={{ $employee -> last_name }} required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" value={{ $employee -> gender }} required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value={{ $employee -> birth_date }} required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Salaray</label>
                                <input type="text" class="form-control" id="salary" name="salary" value={{ $employee -> salary }} required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
