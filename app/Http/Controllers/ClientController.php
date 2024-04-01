<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
use Illuminate\Support\Facades\Storage;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;

use App\DataTables\ClientDataTable;
use Auth;

class ClientController extends Controller
{
    public function index(ClientDataTable $dataTable) {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $client = Client::all();
        // return View::make('admin.clients.index', compact('client'));
        return $dataTable->render('admin.clients.index');
    }

    public function create() {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        return View::make('admin.clients.create');
    }

    public function store(StoreClientRequest $request) {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $data = $request->validated();

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $age = $data['age'];
        $gender = $data['gender'];
        $type = $data['type'];
        $expiration = $data['expiration_date'];
        $visits = 0;

        $client = new Client();

        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->age = $age;
        $client->gender = $gender;
        $client->membership_type = $type;
        $client->membership_expiration = $expiration;
        $client->total_visit = $visits;
        
        
        if(request()->has('image')){
            // $imagePath = request()->file('image')->store('category', 'public');
            $client->img_path = request()->file('image')->store('client', 'public');;
        }
        $client->save();
        // dd($client);

        return Redirect::to('client');
    }

    public function edit($id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $client = Client::find($id);
        return View::make('admin.clients.edit', compact('client'));
    }

    public function delete($id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        Client::destroy($id);
        return Redirect::to('client');
    }

    public function update(Request $request, $id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $age = $request->age;
        $gender = $request->gender;
        $type = $request->type;
        $expiration = $request->expiration_date;

        $client = Client::find($id);
        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->age = $age;
        $client->gender = $gender;
        $client->membership_type = $type;
        $client->membership_expiration = $expiration;
        $client->status = $request->status;

        if($client->img_path == null) {
            if(request()->has('image')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $client->img_path = request()->file('image')->store('client', 'public');
            }
        } else {
            if(request()->has('image')){
                $image_path = $client->img_path;
                Storage::delete('public/'.$image_path);
                $client->img_path = request()->file('image')->store('client', 'public');
            }
        }
        // dd($client);
        $client->save();
        return Redirect::to('client');
    }
}
