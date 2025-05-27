<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
{
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::all();

        $maleCount = Employee::where('gender', 'Male')->count();
        $femaleCount = Employee::where('gender', 'Female')->count();

        $averageAge = Employee::selectRaw('AVG(DATEDIFF(CURDATE(), birth_date) / 365) as average_age')->value('average_age');
        $averageAge = round($averageAge, 0);

        $totalSalary = Employee::sum('salary');

        return view('home', compact('employees', 'maleCount', 'femaleCount', 'averageAge', 'totalSalary'));
    }

}
