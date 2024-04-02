<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\TransactionDataTable;
use App\DataTables\AccountsDataTable;
use Auth;
use App\Models\User_Membership;
use App\Models\Review;
use App\Models\User;
use View;
use Redirect;

class AdminController extends Controller
{
    public function index(TransactionDataTable $dataTable) {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $standardPlanReviews = Review::where('plan', 'Standard Membership')->paginate(10);
        $premium = Review::where('plan', 'Premium')->paginate(10);
        $vip = Review::where('plan', 'VIP')->paginate(10);
        // dump($standardPlanReviews);
        // return View::make('admin.clients.index', compact('client'));
        return $dataTable->render('admin.analytics.index', compact('standardPlanReviews', 'premium', 'vip'));
    }

    public function edit($id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $client = User_Membership::find($id);
        return View::make('admin.analytics.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        if (!(Auth::user()->role == "admin")) {
            $this->authorize('update', $dataTable);
        }
        $payment = $request->payment;
        $duration = $request->duration;
        $membership = $request->membership_plan;

        $transaction = User_Membership::find($id);
        $transaction->membership_type = $request->membership_plan;
        $transaction->duration = $request->duration;
        $transaction->payment = $request->payment;

        $transaction->save();
        return Redirect::to('analytics');
}

public function delete($id)
{
    if (!(Auth::user()->role == "admin")) {
        $this->authorize('update', $dataTable);
    }
    User_Membership::destroy($id);
    return Redirect::to('analytics');
}

public function accounts(AccountsDataTable $dataTable) {
    return $dataTable->render('admin.accounts.index');
}

public function disableAccount($id) {
    $user = User::find($id);
    $user->status = "Disabled";
    $user->save();
    return Redirect::to('accounts');
}
public function enableAccount($id) {
    $user = User::find($id);
    $user->status = "Active";
    $user->save();
    return Redirect::to('accounts');
}
}