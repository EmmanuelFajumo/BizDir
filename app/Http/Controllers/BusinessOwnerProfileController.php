<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BusinessOwnerProfileController extends Controller
{
    /**
     * Display the business owner's profile page.
     */
    public function edit(Request $request): View
    {
        return view('bo_profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the business owner's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
        ]);

        $request->user()->fill($validated);

        

        $request->user()->save();

        return Redirect::route('bo_profile')->with('success', 'Profile updated successfully.');
    }
}
