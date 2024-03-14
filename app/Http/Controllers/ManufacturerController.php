<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use View;
use Redirect;
use App\DataTables\ManufacturerDataTable;

use App\Http\Requests\StoreManufacturerRequest;

class ManufacturerController extends Controller
{
    public function index(ManufacturerDataTable $dataTable) {
        // $manufacturers = Manufacturer::paginate(10);
        // return View::make('admin.manufacturers.index', compact('manufacturers'));
        return $dataTable->render('admin.manufacturers.index');
    }

    public function create() {
        return View::make('admin.manufacturers.create');
    }
    
    public function store(StoreManufacturerRequest $request) {
        $description = $request->description;
        $address = $request->address;
        $contact = $request->contact;
        
        $manufacturer = New Manufacturer();

        $manufacturer->description = $description;
        $manufacturer->address = $address;
        $manufacturer->contact = $contact;

        if(request()->has('image')){
            // $imagePath = request()->file('image')->store('category', 'public');
            $manufacturer->img_path = request()->file('image')->store('manufacturer', 'public');;
        }
        
        // dd($manufacturer);
        $manufacturer->save();
        return Redirect::to('manufacturer');
    }

    public function edit($id) {
        $manufacturer = Manufacturer::find($id);
        return View::make('admin.manufacturers.edit', compact('manufacturer'));
    }

    public function update(Request $request, $id) {
        $description = $request->description;
        $address = $request->address;
        $contact = $request->contact;
        
        $manufacturer = Manufacturer::find($id);

        $manufacturer->description = $description;
        $manufacturer->address = $address;
        $manufacturer->contact = $contact;

        if($manufacturer->img_path == null) {
            if(request()->has('image')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $manufacturer->img_path = request()->file('image')->store('manufacturer', 'public');
            }
        } else {
            if(request()->has('image')){
                $image_path = $manufacturer->img_path;
                Storage::delete('public/'.$image_path);
                $manufacturer->img_path = request()->file('image')->store('manufacturer', 'public');
            }
        }

        $manufacturer->save();
        return Redirect::to('manufacturer');
    }

    public function delete($id) {
        Manufacturer::destroy($id);
        return Redirect::to('manufacturer');
    }
}
