<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\Review;
use App\Models\Report;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard with summary statistics and recent data.
     *
     * Provides an overview of the platform including user counts,
     * business statistics, review data, reports, and pending items.
     */
    public function index()
    {
        // Count totals
        $users = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $businesses = Business::count();
        $verifiedBusinesses = Business::where('is_verified', true)->count();
        $reviews = Review::count();
        $reports = Report::count();
        $pendingReports = Report::where('status', 'pending')->count();
        $categories = Category::count();

        // Average rating across all reviews
        $avgRating = Review::avg('rating');
        $avgRating = $avgRating ? number_format($avgRating, 1) : '—';

        // Recent registrations (latest 5 users)
        $recentUsers = User::latest()->take(5)->get();

        // Businesses pending verification (is_verified = false)
        $pendingBusinesses = Business::where('is_verified', false)
            ->orWhereNull('is_verified')
            ->with('owner')
            ->latest()
            ->take(5)
            ->get();

        // Latest reports
        $recentReports = Report::latest()->take(5)->get();

        return view('admin.admin_dashboard', [
            'users' => $users,
            'activeUsers' => $activeUsers,
            'businesses' => $businesses,
            'verifiedBusinesses' => $verifiedBusinesses,
            'reviews' => $reviews,
            'reports' => $reports,
            'pendingReports' => $pendingReports,
            'categories' => $categories,
            'avgRating' => $avgRating,
            'recentUsers' => $recentUsers,
            'pendingBusinesses' => $pendingBusinesses,
            'recentReports' => $recentReports
        ]);
    }
}
