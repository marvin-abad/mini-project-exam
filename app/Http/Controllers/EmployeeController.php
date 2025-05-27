<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);

        $maleCount = Employee::where('gender', 'Male')->count();
        $femaleCount = Employee::where('gender', 'Female')->count();

        return view('employees.index', compact('employees', 'maleCount', 'femaleCount'));
    }

    public function create()
    {
        // Return the view for creating a new employee
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // validation of data requested
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'birth_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
        ]);

        // Create a new employee record
        $newEmployee = Employee::create($data);

        // Redirect to the employees index with a success message
        return redirect ()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Employee $employee)
    {
        // Return the view for editing an existing employee
        return view('employees.edit', compact('employee'));
    }

    public function update(Employee $employee, Request $request)
    {
        // validation of data requested
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'birth_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
        ]);

        // Update the employee record
        $employee->update($data);

        // Redirect to the employees index with a success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
