<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use Exception;

class MemberBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $viewData = [
            'title' => "Booking",
            'activePage' => "booking",
            'bookings' => $bookings,
        ];

        return view('user.bookings.index', $viewData);
    }
    public function book(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'payment_receipt' => 'required',
        ]);

        try {
            $paymentReceiptPath = null;
            $room = Room::find($validatedData['room_id']);
            if ($request->hasFile('payment_receipt')) {
                // Simpan file gambar ke dalam folder 'payment_receipts' di 'storage/app/public'
                $file = $request->file('payment_receipt');
                $paymentReceiptPath = Storage::disk('public')->put('payment_receipts', $file);
                $validatedData['payment_receipt'] = $paymentReceiptPath;
            }

            Booking::create($validatedData);
            $room->update(['is_available' => 1]);

            return redirect()->route('user.dashboard')->with('success', 'Booking has been successfully created.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'An error occurred while creating the booking. Please try again.');
        }
    }
}
