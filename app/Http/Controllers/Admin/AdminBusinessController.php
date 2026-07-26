<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;

class AdminBusinessController extends Controller
{
    /**
     * Display a listing of all businesses.
     */
    public function index()
    {
        $businesses = Business::with('owner')->latest()->paginate(20);

        // Stats for the top cards
        $totalBusinesses = Business::count();
        $approvedBusinesses = Business::where('status', 'approved')->count();
        $pendingBusinesses = Business::where('status', 'suspended')->count();
        $verifiedBusinesses = Business::where('is_verified', true)->count();
        $unverifiedBusinesses = Business::where('is_verified', false)->count();

         return view('admin.businesses', compact(
            'businesses',
            'totalBusinesses',
            'approvedBusinesses',
            'pendingBusinesses',
            'verifiedBusinesses',
            'unverifiedBusinesses',
            ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified business.
     */
    public function show(string $id)
    {
        $business = Business::with('owner', 'reviews', 'category')->findOrFail($id);
        return view('admin.businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Verify a business (set is_verified to true).
     *
     * Called via PATCH /admin/businesses/{business}/verify
     */
    public function verify(Business $business)
    {
        $business->update(['is_verified' => true]);

        return redirect()->back()
            ->with('success', "Business \"{$business->name}\" has been verified successfully.");
    }

    public function toggleStatus($id)
    {
        $business = Business::findOrFail($id);

        $business->status = $business->status === "approved" ? "pending" : "approved";
        $business->save();

        $action = $business->status === "approved" ? 'approved' : "pending";
        return back()->with('success', "Business {$business->title} has been {$action}");

    }
}
