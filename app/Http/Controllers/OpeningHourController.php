<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpeningHourController extends Controller
{
    protected $fillable = [

    'business_id',
    'day',
    'opens_at',
    'closes_at',
    'is_closed',

];

    public function store(Request $request)
{
    $data = $request->validate([
        'business_id' => 'required|exists:businesses,id',
        'opening_hours' => 'required|array',
        'opening_hours.*.day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        'opening_hours.*.opens_at' => 'nullable|date_format:H:i',
        'opening_hours.*.closes_at' => 'nullable|date_format:H:i',
        'opening_hours.*.is_closed' => 'nullable|boolean',
    ]);

    $businessId = $data['business_id'];

    // Delete existing hours to avoid duplicates
    OpeningHour::where('business_id', $businessId)->delete();

    // Create new hours
    foreach ($data['opening_hours'] as $hour) {
        OpeningHour::create([
            'business_id' => $businessId,
            'day' => $hour['day'],
            'opens_at' => $hour['opens_at'] ?: null,
            'closes_at' => $hour['closes_at'] ?: null,
            'is_closed' => $hour['is_closed'] ?? false,
        ]);
    }

    return redirect()->back()
        ->with('success', 'Opening hours saved successfully!');
}

}
