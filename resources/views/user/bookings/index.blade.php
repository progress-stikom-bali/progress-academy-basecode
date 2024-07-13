{{-- Menggunakan layouts admin --}}
@extends('layouts.template')

{{-- Section untuk menaruh content ke layout --}}
@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">User</th>
                <th scope="col">Room</th>
                <th scope="col">Payment</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col">Rejected Reason</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->room->name }}</td>
                    <td>{{ $item->payment_receipt }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->start_date)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->end_date)->format('Y-m-d') }}</td>
                    <td>
                        @if ($item->status == 'pending')
                            <button class="btn btn-warning">Pending</button>
                        @elseif ($item->status == 'approved')
                            <button class="btn btn-success">Approved</button>
                        @else
                            <button class="btn btn-danger">Rejected</button>
                        @endif
                    </td>
                    <td>{{ $item->rejected_reason }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection