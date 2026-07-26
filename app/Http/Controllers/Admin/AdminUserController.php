<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a paginated, filterable listing of all users.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Search by name or email
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                  ->orWhere('lastname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by role
        if ($role = $request->input('role')) {
            $query->where('role', $role);
        }

        // Filter by status
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        // Sort
        $sortField = $request->input('sort', 'created_at');
        $sortDir = $request->input('dir', 'desc');
        $allowedSorts = ['firstname', 'lastname', 'email', 'role', 'status', 'created_at', 'email_verified_at'];
        if (in_array($sortField, $allowedSorts)) {
            $query->orderBy($sortField, $sortDir === 'asc' ? 'asc' : 'desc');
        }

        $users = $query->paginate(15)->withQueryString();

        // Stats for the top cards
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $suspendedUsers = User::where('status', 'suspended')->count();
        $adminUsers = User::whereIn('role', ['admin', 'super_admin'])->count();

        return view('admin.users', compact(
            'users',
            'totalUsers',
            'activeUsers',
            'suspendedUsers',
            'adminUsers'
        ));
    }

    /**
     * Toggle user status between active and suspended.
     */
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

        // Prevent self-suspension
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot suspend your own account.');
        }

        $user->status = $user->status === 'active' ? 'suspended' : 'active';
        $user->save();

        $action = $user->status === 'active' ? 'activated' : 'suspended';
        return back()->with('success', "User {$user->firstname} {$user->lastname} has been {$action}.");
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent self-deletion
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $name = $user->firstname . ' ' . $user->lastname;
        $user->delete();

        return back()->with('success', "User {$name} has been permanently deleted.");
    }
}
