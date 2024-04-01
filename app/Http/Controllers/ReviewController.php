<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Redirect;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $review = New Review();

        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->plan = $request->plan;
        $review->user_id = $request->user;

        $review->save();


    }
}
