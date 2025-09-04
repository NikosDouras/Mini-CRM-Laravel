<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = \App\Models\Employee::with('company')->latest()->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name','id');
        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('status','Ο υπάλληλος δημιουργήθηκε.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::orderBy('name')->pluck('name','id');
        return view('employees.edit', compact('employee','companies'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('status','Ο υπάλληλος ενημερώθηκε.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('status','Ο υπάλληλος διαγράφηκε.');
    }
}