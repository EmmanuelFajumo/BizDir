<?php

namespace App\Http\Controllers;
use App\Models\User;


use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:100',
            'body' => 'nullable|string|max:1000',
        ]);

        $review = Review::create([
            'user_id' => auth()->id(),
            'business_id' => $request->business_id,
            'rating' => $request->rating,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}
