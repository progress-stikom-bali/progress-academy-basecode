<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Exception;

class MemberBookingController extends Controller
{
    public function book(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'transfer_receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_available' => 'required',
        ]);

        try {
            $paymentReceiptPath = null;
            $room = Room::find($validatedData['room_id']);

            if ($request->hasFile('transfer_receipt')) {
                $paymentReceiptPath = $request->file('transfer_receipt')->store('payment_receipts', 'public');
            }

            Booking::create($validatedData);
            $room->update(['is_available' => $request->is_available]);

            return redirect()->route('user.dashboard')->with('success', 'Booking has been successfully created.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the booking. Please try again.');
        }
    }
}
