{{-- Menggunakan layouts admin --}}
@extends('layouts.admin')

{{-- Section untuk menaruh content ke layout --}}
@section('content')
    <form action="{{ route('admin.roomType.update', $data->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="daily_price" class="form-label">Daily Price</label>
            <input type="number" class="form-control" id="dailyPrice" name="daily_price" value="{{ $data->daily_price }}" required>  
            @error('daily_price')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
@endsection

