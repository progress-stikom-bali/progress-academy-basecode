{{-- Menggunakan layouts admin --}}
@extends('layouts.admin')

{{-- Section untuk menaruh content ke layout --}}
@section('content')
    <form action="{{ route('admin.rooms.update', $data->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{{ $data->description }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="roomType" class="form-label">Room Type</label>
            <select name="room_type_id" id="roomTypeId" class="form-select">
                @if ($data->roomType)
                    <option value="{{ $data->roomType->id }}">{{ $data->roomType->name }}
                        ({{ $data->roomType->daily_price }})</option>
                @endif
                @foreach ($roomTypes as $roomType)
                    @if (!$data->roomType || $roomType->id != $data->roomType->id)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }} ({{ $roomType->daily_price }})</option>
                    @endif
                @endforeach
            </select>
            @error('room_type_id')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
@endsection
