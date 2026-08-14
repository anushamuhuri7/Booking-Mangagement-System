<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookings;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        $data = Bookings::join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'users.name as user_name')
            ->get();
        return view('AdminDashboard.Bookings.index', compact('data'));
    }

    public function userBookings()
    {
        $data = Bookings::join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'users.name as user_name')
            ->where('bookings.user_id', Auth::id())
            ->get();
        return view('UserDashboard.Bookings.index', compact('data'));
    }

    public function add()
    {
        $data = User::all();
        $booking = null;
        if (Auth::user()->user_type == 1) {
            return view('AdminDashboard.Bookings.addEdit', compact('data', 'booking'));
        }
        return view('AdminDashboard.Bookings.addEdit', compact('data', 'booking'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'booking_name' => 'required|string',
            'booking_on' => 'required',
            'booking_status' => 'required',
        ]);

        Bookings::create([
            'name' => $request->booking_name,
            'booking_datetime' => $request->booking_on,
            'status' => $request->booking_status,
            'user_id' => $request->user_name ?? Auth::id(),
        ]);

        if (Auth::user()->user_type == 1) {
            return redirect()->route('booking.all')->with('success', 'Booking created successfully.');
        }
        return redirect()->route('booking.my')->with('success', 'Booking created successfully.');
    }

    public function getBookingsById($id)
    {
        $booking = Bookings::findOrFail($id);
        $data = User::all();
        if (Auth::user()->user_type == 1) {
            return view('AdminDashboard.Bookings.addEdit', compact('data', 'booking'));
        }
        return view('AdminDashboard.Bookings.addEdit', compact('data', 'booking'));
    }

    public function updateBookingsById(Request $request, $id)
    {
        $request->validate([
            'booking_name' => 'required|string',
            'booking_on' => 'required',
            'booking_status' => 'required',
        ]);

        $booking = Bookings::findOrFail($id);
        $booking->update([
            'name' => $request->booking_name,
            'booking_datetime' => $request->booking_on,
            'status' => $request->booking_status,
            'user_id' => $request->user_name ?? Auth::id(),
        ]);

        if (Auth::user()->user_type == 1) {
            return redirect()->route('booking.all')->with('success', 'Booking updated successfully.');
        }
        return redirect()->route('booking.my')->with('success', 'Booking updated successfully.');
    }

    public function viewDelete($id)
    {
        if (Auth::user()->user_type == 1) {
            return view('AdminDashboard.Bookings.delete');
        }
        return view('UserDashboard.Bookings.delete');
    }

    public function delete($id)
    {
        Bookings::findOrFail($id)->delete();
        if (Auth::user()->user_type == 1) {
            return redirect()->route('booking.all')->with('success', 'Booking deleted successfully.');
        }
        return redirect()->route('booking.my')->with('success', 'Booking deleted successfully.');
    }
}
