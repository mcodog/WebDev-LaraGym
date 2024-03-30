<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use Auth;
use Redirect;
use App\Models\Service;
use App\Models\User;

use App\Models\User_Info;

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
    public function getProfile() {
        $users = DB::table('users')
        // ->join('user_info', 'user_info.id', '=', 'users.id')
        ->join('user_info', 'user_info.id', '=', 'users.id')
        ->select('users.name AS name', 'users.email AS email', 'user_info.age AS age', 'user_info.address AS address', 'user_info.gender AS gender', 'user_info.image_path AS image_path')
        ->where('users.id', Auth::user()->id) // Add your where condition here
        ->get();
        // dump(Auth::user()->id);
        return View::make('auth.profile', compact('users'));
    }

    public function saveProfile(Request $request, $id) {
        if ($request->filled('name')) {
            $userinfo = User::find($id);
            $userinfo->name = $request->name;
            $userinfo->save();
        }

        if ($request->filled('email')) {
            $userinfo = User::find($id);
            $userinfo->email = $request->email;
            $userinfo->save();
        }

        if ($request->filled('age')) {
            $userinfo = User_Info::find($id);
            $userinfo->age = $request->age;
            $userinfo->save();
        }

        if ($request->filled('gender')) {
            $userinfo = User_Info::find($id);
            $userinfo->gender = $request->gender;
            $userinfo->save();
        }

        return Redirect::to(route('get.profile'));
        // $description = $request->description;
        // $address = $request->address;
        // $contact = $request->contact;
        
        // $manufacturer = User_Info::find($id);

        // $manufacturer->description = $description;
        // $manufacturer->address = $address;
        // $manufacturer->contact = $contact;
    }
}
