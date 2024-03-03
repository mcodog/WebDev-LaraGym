<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;

class EmployeeController extends Controller
{
    public function index() {
        return View::make('admin.employees.index');
    }

    public function create() {
        return View::make('admin.employees.create');
    }
}
