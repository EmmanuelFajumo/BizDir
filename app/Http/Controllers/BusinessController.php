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

class BusinessController extends Controller
{
    /**
     * Show the form for creating a new business listing.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('get_listed', [
            'categories' => $categories,
            'states' => $states,
        ]);
    }

    /**
     * Store a newly created business in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'state_id' => 'required|exists:states,id',
            'lga_id' => 'required|exists:lgas,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'year_established' => 'nullable|integer|min:1800|max:' . date('Y'),
            'employees' => 'nullable|integer|min:1|max:100000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('businesses/logos', 'public');
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('businesses/covers', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        Business::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Your business has been submitted for review! We\'ll notify you once it\'s approved.');
    }



    public function createListing() {
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('bo_create_listing', [
            'categories' => $categories,
            'states' => $states,
        ]);
    }


    public function storee(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'state_id' => 'required|exists:states,id',
            'lga_id' => 'required|exists:lgas,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'year_established' => 'nullable|integer|min:1800|max:' . date('Y'),
            'employees' => 'nullable|integer|min:1|max:100000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'opening_hours' => 'nullable|array',
            'opening_hours.*.day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'opening_hours.*.opens_at' => 'nullable|date_format:H:i',
            'opening_hours.*.closes_at' => 'nullable|date_format:H:i',
            'opening_hours.*.is_closed' => 'nullable|boolean',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('businesses/logos', 'public');
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('businesses/covers', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        $business = Business::create($validated);

        // Save opening hours
        if ($request->has('opening_hours')) {
            foreach ($request->opening_hours as $hour) {
                OpeningHour::create([
                    'business_id' => $business->id,
                    'day' => $hour['day'],
                    'opens_at' => !empty($hour['opens_at']) ? $hour['opens_at'] : null,
                    'closes_at' => !empty($hour['closes_at']) ? $hour['closes_at'] : null,
                    'is_closed' => isset($hour['is_closed']) && $hour['is_closed'] == '1' ? true : false,
                ]);
            }
        }

        return redirect()->route('bo_dashboard')
            ->with('success', 'Your business has been submitted for review! We\'ll notify you once it\'s approved.');
    }

    /**
     * Get LGAs for a given state (AJAX).
     */
    public function getLgas($stateId)
    {
        $lgas = Lga::where('state_id', $stateId)->orderBy('name')->get();
        return response()->json($lgas);
    }



    public function myBusinesses() {
        $businesses = Business::where('user_id', Auth::id())->get();
        return view('bo_businesses', [
            'businesses' => $businesses
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

    public function editBusiness($id) {
        $business = Business::findOrFail($id);
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $states = State::orderBy('name')->get();
        $lgas = Lga::where('state_id', $business->state_id)->orderBy('name')->get();
        $openingHours = OpeningHour::where('business_id', $id)->get()->keyBy('day');
        return view('bo_edit_listing', [
            'business' => $business,
            'categories' => $categories,
            'states' => $states,
            'lgas' => $lgas,
            'openingHours' => $openingHours,
        ]);
    }

    public function updateBusiness(Request $request, $id)
    {
        $business = Business::findOrFail($id);

        // Ensure the user owns this business
        if ($business->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'state_id' => 'required|exists:states,id',
            'lga_id' => 'required|exists:lgas,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'year_established' => 'nullable|integer|min:1800|max:' . date('Y'),
            'employees' => 'nullable|integer|min:1|max:100000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'opening_hours' => 'nullable|array',
            'opening_hours.*.day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'opening_hours.*.opens_at' => 'nullable|date_format:H:i',
            'opening_hours.*.closes_at' => 'nullable|date_format:H:i',
            'opening_hours.*.is_closed' => 'nullable|boolean',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($business->logo) {
                Storage::disk('public')->delete($business->logo);
            }
            $validated['logo'] = $request->file('logo')->store('businesses/logos', 'public');
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Delete old cover image
            if ($business->cover_image) {
                Storage::disk('public')->delete($business->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('businesses/covers', 'public');
        }

        $business->update($validated);

        // Update opening hours: delete old ones and create new
        if ($request->has('opening_hours')) {
            OpeningHour::where('business_id', $business->id)->delete();
            foreach ($request->opening_hours as $hour) {
                OpeningHour::create([
                    'business_id' => $business->id,
                    'day' => $hour['day'],
                    'opens_at' => !empty($hour['opens_at']) ? $hour['opens_at'] : null,
                    'closes_at' => !empty($hour['closes_at']) ? $hour['closes_at'] : null,
                    'is_closed' => isset($hour['is_closed']) && $hour['is_closed'] == '1' ? true : false,
                ]);
            }
        }

        return redirect()->route('bo_dashboard')
            ->with('success', 'Your business has been updated successfully!');
    }
}
