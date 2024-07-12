{{-- Menggunakan layouts admin --}}
@extends('layouts.admin')

{{-- Section untuk menaruh content ke layout --}}
@section('content')
    <a class="btn btn-primary" href="{{ route('admin.rooms.create') }}">Add Room</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Room Type</th>
                <th scope="col">Price</th>
                <th scope="col">Available</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rooms as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->roomType->name }}</td>
                    <td>{{ $item->roomType->daily_price }}</td>
                    <td>{!! $item->is_available == 0 ? '<button class="btn btn-success">Yes</button>' : '<button class="btn btn-danger">No</button>' !!}</td>
                    <td class="d-flex gap-2">
                    <a href="{{ route('admin.rooms.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.rooms.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
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
