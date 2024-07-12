@extends('layouts.template')

@section('content')
    <div class="container text-center">
        <h2>
            Welcome to our hotel booking system
        </h2>
        <h4>Please choose your room</h4>
    </div>
    @forelse ($rooms as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/hotel_room.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $item->roomType->name }} | {{ $item->name }}</h5>
                <p class="card-text">
                    {{ $item->description }}
                </p>
                <h5>IDR {{ number_format($item->roomType->daily_price) }}</h5>
                @if ($item->is_available == 0)
                    <button class="btn btn-success">Available</button>
                @else
                    <button class="btn btn-danger">Booked</button>
                @endif
                <a href="{{ route('user.roomDetail', $item->id) }}" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    @empty
        <h4 class="text-center">No Data</h4>
    @endforelse
@endsection
