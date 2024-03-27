<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use View;
use Redirect;
use Illuminate\Support\Facades\Storage;
use App\DataTables\EmployeeDataTable;
use Auth;

use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $dataTable) {
        // $employee = Employee::all();
        // return View::make('admin.employees.index', compact('employee'));
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        
        return $dataTable->render('admin.employees.index');
    }

    public function create() {
        
        return View::make('admin.employees.create');
    }

    public function store(StoreEmployeeRequest $request) {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $data = $request->validated();

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $age = $data['age'];
        $gender = $data['gender'];
        $type = $data['type'];
        $status = $data['status'];

        // $first_name = $request->first_name;
        // $last_name = $request->last_name;
        // $age = $request->age;
        // $gender = $request->gender;
        // $type = $request->type;
        // $status = $request->status;

        $employee = new Employee();

        $employee->first_name = $first_name;
        $employee->last_name = $last_name;
        $employee->age = $age;
        $employee->gender = $gender;
        $employee->job_type = $type;
        $employee->status = $status;
        
        if(request()->has('image')){
            // $imagePath = request()->file('image')->store('category', 'public');
            $employee->img_path = request()->file('image')->store('employee', 'public');;
        }
        $employee->save();
        // dd($employee);

        return Redirect::to('employee');
    }

    public function edit($id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $employee = Employee::find($id);
        return View::make('admin.employees.edit', compact('employee'));
    }

    public function delete($id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        Employee::destroy($id);
        return Redirect::to('employee');
    }

    public function update(StoreEmployeeRequest $request, $id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $data = $request->validated();

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $age = $data['age'];
        $gender = $data['gender'];
        $type = $data['type'];
        $status = $data['status'];

        $employee = Employee::find($id);

        $employee->first_name = $first_name;
        $employee->last_name = $last_name;
        $employee->age = $age;
        $employee->gender = $gender;
        $employee->job_type = $type;
        $employee->status = $status;

        if($employee->img_path == null) {
            if(request()->has('image')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $employee->img_path = request()->file('image')->store('employee', 'public');
            }
        } else {
            if(request()->has('image')){
                $image_path = $employee->img_path;
                Storage::delete('public/'.$image_path);
                $employee->img_path = request()->file('image')->store('employee', 'public');
            }
        }
        // dd($client);
        $employee->save();
        return Redirect::to('employee');
    }
}
