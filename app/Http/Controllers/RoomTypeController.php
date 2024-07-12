<?php

namespace App\Http\Controllers;

// Methods
use Illuminate\Http\Request;
use Exception;

// Models
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    // Function untuk halaman utama dari Room Type
    public function index()
    {
        $roomTypes = RoomType::all();
        $viewData = [
            'title' => "Room Type Management",
            'activePage' => "room-type",
            'roomTypes' => $roomTypes,
        ];
        return view('admin.roomType.index', $viewData);
    }

    public function create()
    {
        $viewData = [
            'title' => "Create Room Type",
            'activePage' => "room-type",
        ];
        return view('admin.roomType.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'daily_price' => 'required',
            ]);
            RoomType::create($validatedData);
            return redirect()->route('admin.roomType.index')->with('success', 'Room Type created successfully!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to create Room Type' . $e);
        }
    }

    public function edit(string $id)
    {
        $roomType = RoomType::find($id);
        $viewData = [
            'title' => "Edit Room Type",
            'activePage' => "room-type",
            'data' => $roomType,
        ];
        return view('admin.roomType.edit', $viewData);
    }

    public function update(Request $request, string $id)
    {
        $roomType = RoomType::find($id);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'daily_price' => 'required|integer',
            ]);
            $roomType->update($validatedData);
            return redirect()->route('admin.roomType.index')->with('success', 'Room Type edited successfully!');
        } catch (Exception $e){
            return back()->withInput()->with('error', 'Failed to edit Room Type!' . $e);
        }
    }

    public function destroy(Request $request)
    {
        $roomType = RoomType::find($request->id);
        try {
            $roomType->delete();
            return redirect()->route('admin.roomType.index')->with('success', 'Room Type deleted successfully!');
        } catch (Exception $e) {  
            return back()->withInput()->with('error', 'Failed to delete Room Type!' . $e);
        }
    }
}