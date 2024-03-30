<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\Service;

class TransactionController extends Controller
{
    public function indexCoaching() {
        $services = Service::paginate(5);
        return View::make('client.training.index', compact('services'));
    }

    public function showDetails($id) {
        $service = Service::find($id);
        return View::make('client.training.details', compact('service'));
    }

    public function searchResult(Request $request) {
        $services = Service::search($request->queryyy)->get();
        return View::make('client.training.search', ['services' => $services]);
    }

    public function trainwithus() {
        return View::make('client.membership.index');
    }
    public function store(Request $request) {
        dump(Auth::user()->name);
        dump(Auth::user()->email);
        dump($request->membership_plan);
        // if (!(Auth::user()->role == "admin")) {
        //     $this->authorize('update', $dataTable);
        // }
        // $data = $request->validated();

        // $first_name = $data['first_name'];
        // $last_name = $data['last_name'];
        // $age = $data['age'];
        // $gender = $data['gender'];
        // $type = $data['type'];
        // $expiration = $data['expiration_date'];
        // $visits = 0;

        // $client = new Client();

        // $client->first_name = $first_name;
        // $client->last_name = $last_name;
        // $client->age = $age;
        // $client->gender = $gender;
        // $client->membership_type = $type;
        // $client->membership_expiration = $expiration;
        // $client->total_visit = $visits;
        
        // if(request()->has('image')){
        //     // $imagePath = request()->file('image')->store('category', 'public');
        //     $client->img_path = request()->file('image')->store('client', 'public');;
        // }
        // $client->save();
        // // dd($client);

        // return Redirect::to('client');
    }
}

