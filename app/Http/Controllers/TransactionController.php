<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
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
}
