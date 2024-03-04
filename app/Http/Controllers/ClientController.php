<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;

use App\Models\Client;

class ClientController extends Controller
{
    public function index() {
        $client = Client::all();
        return View::make('admin.clients.index', compact('client'));
    }

    public function create() {
        return View::make('admin.clients.create');
    }

    public function store(Request $request) {
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $age = $request->age;
        $gender = $request->gender;
        $type = $request->type;
        $expiration = $request->expiration_date;
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
        $client = Client::find($id);
        return View::make('admin.clients.edit', compact('client'));
    }

    public function delete($id)
    {
        Client::destroy($id);
        return Redirect::to('client');
    }

    public function update(Request $request, $id)
    {
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
