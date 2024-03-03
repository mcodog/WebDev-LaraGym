<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;

class EquipmentController extends Controller
{
    public function index() {
        return View::make('admin.equipments.index');
    }
}
