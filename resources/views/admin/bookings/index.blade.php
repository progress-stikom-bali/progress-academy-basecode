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
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->room->name }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentReceiptModal">
                            View
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="paymentReceiptModal" tabindex="-1" role="dialog"
                            aria-labelledby="paymentReceiptModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentReceiptModalLabel">Payment Receipt</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $item->payment_receipt }}" alt="payment_receipt">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
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
                    <td class="d-flex gap-2">
                        <form action="{{ route('admin.booking.approve') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-success"
                                onclick="return confirm('Are You Sure?')">Aprrove</button>
                        </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                            Reject
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog"
                            aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Reject Book</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.booking.reject') }}" method="POST">
                                            @csrf
                                            <label for="rejected_reason" class="mb-2">Reason</label>
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="text" name="rejected_reason" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
