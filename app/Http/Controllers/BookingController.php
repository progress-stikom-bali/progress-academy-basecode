<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

// Import Models
use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        $viewData = [
            'title' => "Booking",
            'activePage' => "booking",
            'bookings' => $bookings,
        ];

        return view('admin.bookings.index', $viewData);
    }

    public function approve(Request $request){
        try{
            $booking = Booking::find($request->id);
            $booking->update(
                [
                    'status' => 'approved',
                ]
            ); 
            return back()->with('success', 'Booking has been successfully approved.');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while approving the booking. Please try again.');
        }
    }

    public function reject(Request $request){
        try{
            $booking = Booking::find($request->id);
            $room = Room::find($booking->room_id);
            $booking->update(
                [
                    'status' => 'rejected',
                    'rejected_reason' => $request->rejected_reason,
                ]
            ); 
            return back()->with('success', 'Booking has been successfully rejected.');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while rejecting the booking. Please try again.');
        }
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try{
            $booking = Booking::find($request->id);
            $booking->update(
                [
                    'is_available' => 0,
                    'status' => 'rejected',
                    'rejected_reason' => $request->rejected_reason,
                ]
            ); 
            return redirect()->route('admin.booking.index')->with('success', 'Booking has been successfully rejected.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while rejecting the booking. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
