<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $appName = 'ShiftBoard';
        $description = 'Manage your team shifts in one place.';

        $employees = Employee::all();
        $employeeCount = $employees->count();

        return view('home', [
            'appName' => $appName,
            'description' => $description,
            'employeeCount' => $employeeCount,
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:30',
            'role' => 'required|string|max:100',
        ]);

        Employee::create($validated);

        return redirect('/')
            ->with('success', 'Employee added successfully!');
    }
}
?>