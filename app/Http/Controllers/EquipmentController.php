<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;

use App\Models\Equipment;
use Illuminate\Support\Facades\Storage;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    public function index() {
        $equipments = DB::table('equipments')
        ->join('manufacturers', 'manufacturers.id', '=', 'equipments.manufacturer_id')
        ->select('manufacturers.description AS manufacturer', 'equipments.description AS equipment', 'equipments.weight', 'equipments.dimension', 'equipments.cost', 'equipments.notes', 'equipments.category', 'equipments.manufacturer_id', 'equipments.img_path', 'equipments.id')
        ->get();
        return View::make('admin.equipments.index', compact('equipments'));
    }

    public function create() {
        $manufacturers = Manufacturer::all();
        return View::make('admin.equipments.create', compact('manufacturers'));
    }
    
    public function store(Request $request) {
        $description = $request->description;
        $category = $request->category;
        $weight = $request->weight;
        $dimension = $request->dimension;
        $cost = $request->cost;
        $notes = $request->notes;
        $manufacturer = $request->manufacturer;

        $equipment = New Equipment();

        $equipment->description = $description;
        $equipment->category = $category;
        $equipment->weight = $weight;
        $equipment->dimension = $dimension;
        $equipment->cost = $cost;
        $equipment->notes = $notes;
        $equipment->manufacturer_id = $manufacturer;

        if(request()->has('image')){
            // $imagePath = request()->file('image')->store('category', 'public');
            $equipment->img_path = request()->file('image')->store('equipment', 'public');;
        }

        $equipment->save();
        return Redirect::to('equipment');
    }

    public function edit($id) {
        $equipment = Equipment::find($id);
        $manufacturer = Manufacturer::where('id', $equipment->manufacturer_id)->first();
        $manufacturers = Manufacturer::all();
        return View::make('admin.equipments.edit', compact('equipment', 'manufacturer', 'manufacturers'));
    }

    public function update(Request $request, $id) {
        $description = $request->description;
        $category = $request->category;
        $weight = $request->weight;
        $dimension = $request->dimension;
        $cost = $request->cost;
        $notes = $request->notes;
        $manufacturer = $request->manufacturer;

        $equipment = Equipment::find($id);

        $equipment->description = $description;
        $equipment->category = $category;
        $equipment->weight = $weight;
        $equipment->dimension = $dimension;
        $equipment->cost = $cost;
        $equipment->notes = $notes;
        $equipment->manufacturer_id = $manufacturer;

        if($equipment->img_path == null) {
            if(request()->has('image')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $equipment->img_path = request()->file('image')->store('equipment', 'public');
            }
        } else {
            if(request()->has('image')){
                $image_path = $equipment->img_path;
                Storage::delete('public/'.$image_path);
                $equipment->img_path = request()->file('image')->store('equipment', 'public');
            }
        }

        $equipment->save();
        return Redirect::to('equipment');
    }

    public function delete($id) {
        Equipment::destroy($id);
        return Redirect::to('equipment');
    }


}