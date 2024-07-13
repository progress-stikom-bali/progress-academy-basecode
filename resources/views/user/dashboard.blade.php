@extends('layouts.template')

@section('content')
    <div class="container text-center">
        <h2>
            Welcome to our hotel booking system
        </h2>
        <h4>Please choose your room</h4>
    </div>
    <div class="d-flex gap-4">
        @forelse ($rooms as $item)
            <div class="card" style="width: 18rem; height:30rem">
                <img src="{{ route('show.room.image', basename($item->image)) }}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column gap-2 justify-content-between">
                    <div class="d-flex flex-column">
                        <h5 class="card-title">{{ $item->roomType->name }} | {{ $item->name }}</h5>
                        <p class="card-text">
                            {{ Str::limit($item->description, 200) }}
                        </p>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <h5>IDR {{ number_format($item->roomType->daily_price) }}</h5>
                        @if ($item->is_available == 0)
                            <button class="btn btn-success">Available</button>
                        @else
                            <button class="btn btn-danger">Booked</button>
                        @endif
                        <a href="{{ route('user.roomDetail', $item->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <h4 class="text-center">No Data</h4>
        @endforelse
    </div>
@endsection
