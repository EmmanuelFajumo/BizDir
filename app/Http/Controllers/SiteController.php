<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use App\Models\State;
use App\Models\Lga;
use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    /**
     * Show the form for creating a new business listing.
     */
    public function create()
    {
        $businesses = Business::where('is_verified', true)->orderBy('name')->get();
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('get_listed', [
            'businesses' => $businesses,
            'categories' => $categories,
            'states' => $states,
        ]);
    }

    /**
     * Get LGAs for a given state (AJAX).
     */
    public function getLgas($stateId)
    {
        $lgas = Lga::where('state_id', $stateId)->orderBy('name')->get();
        return response()->json($lgas);
    }

    public function cat_state(){
        $businesses = Business::with(['category', 'state', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->where('is_verified', true)
            ->where('status', 'approved')
            ->latest()
            ->limit(6)
            ->get();
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('home', [
            'businesses' => $businesses,
            "categories" => $categories,
            "states" => $states,
        ]);
    }

    public function view_business($id){
        $business_det = Business::with([
                'category',
                'state',
                'lga',
                'openingHours',
                'reviews.user',
            ])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->findOrFail($id);

        return view('business_detail', [
            'business_det' => $business_det,
        ]);
    }

    public function filter(){
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('browse_businesses', [
            "categories" => $categories,
            "states" => $states,
        ]);
    }

    public function browseBusinesses(Request $request)
    {
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();

        $query = Business::where('status', 'approved');

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by state
        if ($request->filled('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        // Filter by keyword search
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('address', 'like', "%{$keyword}%");
            });
        }

        $businesses = $query->orderBy('name')->paginate(12)->withQueryString();

        return view('browse_businesses', [
            'businesses' => $businesses,
            'categories' => $categories,
            'states' => $states,
            'selectedCategory' => $request->category_id,
            'selectedState' => $request->state_id,
            'keyword' => $request->keyword,
        ]);
    }

    public function viewBusiness($id) {
        $business = Business::findOrFail($id);
        $openingHours = OpeningHour::where('business_id', $id)->get();
        $lgas = Lga::where('state_id', $business->state_id)->orderBy('name')->get();
        return view('bo_view_business', [
            'business' => $business,
            'openingHours' => $openingHours,
            'lgas' => $lgas,
        ]);
    }
}
