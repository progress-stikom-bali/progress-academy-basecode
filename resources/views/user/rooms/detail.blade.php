@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('images/hotel_room.jpg') }}" class="w-100" alt="hotel-image">
            </div>
            <div class="col-6">
                <h1>{{ $room->name }}</h1>
                <h3 class="text-secondary">{{ $room->roomType->name }}</h3>
                <p>{{ $room->description }}</p>
                <form action="{{ route('user.book') }}" method="POST" class="d-flex flex-column gap-2">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                    <input type="hidden" name="user_id" value="{{ $room->id }}">
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="rejected_reason" value="">
                    <input type="hidden" name="is_available" value="1">
                    <label for="start_date">Check In</label>
                    <input type="date" name="start_date" class="form-control" required>
                    <label for="end_date">Check Out</label>
                    <input type="date" name="end_date" class="form-control" required>
                    <label for="transfer_receipt">Transfer Receipt</label>
                    <input type="file" name="transfer_receipt" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-primary">Book Now!</button>
                </form>
            </div>
        </div>
    </div>
@endsection