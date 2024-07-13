<?php

namespace App\Http\Controllers\Admin;

// Methods
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Exception;

// Models
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    // Function untuk halaman utama dari Room
    public function index()
    {
        $rooms = Room::all();
        $viewData = [
            'title' => "Rooms Management",
            'activePage' => "room",
            'rooms' => $rooms,
        ];
        return view('admin.rooms.index', $viewData);
    }

    public function create()
    {
        $viewData = [
            'title' => "Create Room",
            'activePage' => "room",
            'roomTypes' => RoomType::all(),
        ];
        return view('admin.rooms.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'room_type_id' => 'required',
                'name' => 'required|string|max:255',
                'description' => 'required',
                'is_available' => 'required',
            ]);
            Room::create($validatedData);
            return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
        } catch (ValidationException $e) {
            // Tangani error validasi
            return back()->withErrors($e->validator)->withInput()->with('error', 'Failed to create room due to validation error.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to create Room' . $e);
        }
    }

    public function edit(string $id)
    {
        $room = Room::find($id);
        $viewData = [
            'title' => "Edit Room",
            'activePage' => "room",
            'data' => $room,
            'roomTypes' => RoomType::all(),
        ];
        return view('admin.rooms.edit', $viewData);
    }

    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        try {
            $validatedData = $request->validate([
                'room_type_id' => 'required',
                'name' => 'required|string|max:255',
                'description' => 'required',
            ]);
            $room->update($validatedData);
            return redirect()->route('admin.rooms.index')->with('success', 'Room edited successfully!');
        } catch (ValidationException $e) {
            // Tangani error validasi
            return back()->withErrors($e->validator)->withInput()->with('error', 'Failed to update room due to validation error.');
        } catch (Exception $e){
            return back()->withInput()->with('error', 'Failed to edit Room!' . $e);
        }
    }

    public function destroy(Request $request)
    {
        $room = Room::find($request->id);
        try {
            $room->delete();
            return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
        } catch (ValidationException $e) {
            // Tangani error validasi
            return back()->withErrors($e->validator)->withInput()->with('error', 'Failed to delete room due to validation error.');
        } catch (Exception $e) {  
            return back()->withInput()->with('error', 'Failed to delete Room!' . $e);
        }
    }
}