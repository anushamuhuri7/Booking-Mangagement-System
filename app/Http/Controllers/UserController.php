<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Bookings;
use App\Models\WebPage;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('AdminDashboard.Users.index', compact('data'));
    }

    public function add()
    {
        return view('AdminDashboard.Users.addEdit');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_no' => 'required|string',
            'user_type' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => bcrypt('password123'), // default password
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('user.all')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('AdminDashboard.Users.addEdit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_no' => 'required|string',
            'user_type' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('user.all')->with('success', 'User updated successfully.');
    }

    public function viewDelete($id)
    {
        return view('AdminDashboard.Users.delete');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.all')->with('success', 'User deleted successfully.');
    }

    public function getProfile()
    {
        $data = Auth::user();
        if (Auth::user()->user_type == 1) {
            return view('AdminDashboard.Profile.index', compact('data'));
        }
        return view('UserDashboard.Profile.index', compact('data'));
    }

    public function saveProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone_no' => 'required|string',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function adminDashboard()
    {
        $data = [
            'totalUsers' => User::count(),
            'adminUsers' => User::where('user_type', 1)->count(),
            'clientUsers' => User::where('user_type', 2)->count(),
            'totalBookings' => Bookings::count(),
            'completedBookings' => Bookings::where('status', 3)->count(),
            'totalWebpages' => WebPage::count(),
            'activeWebpages' => WebPage::where('status', 1)->count(),
        ];
        return view('AdminDashboard.index', compact('data'));
    }

    public function userDashboard()
    {
        $data = [
            'totalBookings' => Bookings::where('user_id', Auth::id())->count(),
            'completedBookings' => Bookings::where('user_id', Auth::id())->where('status', 3)->count(),
        ];
        return view('UserDashboard.index', compact('data'));
    }
}