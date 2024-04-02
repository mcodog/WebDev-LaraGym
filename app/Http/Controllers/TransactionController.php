<?php

namespace App\Http\Controllers;
use Symfony\Component\Console\Output\NullOutput;

use Illuminate\Http\Request;
use View;
use DB;
use Auth;
use Redirect;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Manufacturer;
// use Illuminate\Http\Request;
// use View;
// use Redirect;
use App\DataTables\ManufacturerDataTable;

use App\Http\Requests\StoreManufacturerRequest;
// use Auth;

use App\Models\User_Info;
use App\Models\User_Membership;

use App\Mail\Signup;
use Mail;

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
        // print("dsa");
        $MembershipData = User_Membership::where('user_id', Auth::user()->id)->get();
        // dump($MembershipData->first()->membership_type);
        if($MembershipData->isEmpty()) {
            return View::make('client.membership.index');
        } else {
            return View::make('client.membership.review', compact('MembershipData'));
        }
        
    }

    public function store(Request $request) {
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'><div class='m-3 alert alert-success'>Transaction Successful: ". Auth::user()->name ." availed ". $request->membership_plan ." Membership</div>";
        flush();

        $transaction = New User_Membership();

        $transaction->user_id = Auth::user()->id;
        $transaction->membership_type = $request->membership_plan;
        $transaction->duration = $request->duration;
        $transaction->payment = $request->payment;


        $payment = $request->payment;
        $duration = $request->duration;
        $membership = $request->membership_plan;

        $transaction->save();

        Mail::to(Auth::user()->email)->send(new Signup($payment, $membership, $duration));
        
        echo "<script>
        setTimeout(function(){
            window.location.href = '".route('home')."';
        }, 5000); // 5000 milliseconds = 5 seconds
      </script>";
        // echo Auth::user()->email;
        // dump(Auth::user()->email);
        // dump($request->membership_plan);
        // dump($request->duration);
        // dump($request->payment);
        
        // sleep(5);

        // return Redirect::route('client.home');
        
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

    public function getProfile() {
        $users = DB::table('users')
        // ->join('user_info', 'user_info.id', '=', 'users.id')
        ->join('user_info', 'user_info.id', '=', 'users.id')
        ->select('users.name AS name', 'users.email AS email', 'user_info.age AS age', 'user_info.address AS address', 'user_info.gender AS gender', 'user_info.image_path AS image_path', 'users.id as id')
        ->where('users.id', Auth::user()->id) // Add your where condition here
        ->get();
        // dump($users->first());
        return View::make('auth.profile', compact('users'));
    }

    public function saveImage(Request $request, $id) {
        $user = User_Info::find($id);
        if(request()->has('image')){
            // $imagePath = request()->file('image')->store('category', 'public');
            $user->image_path = request()->file('image')->store('users', 'public');;
        }
        $user->save();
        return Redirect::to('profile');
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
