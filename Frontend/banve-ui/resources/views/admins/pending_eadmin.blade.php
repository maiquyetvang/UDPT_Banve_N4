<!-- pending_eadmin.blade.php -->

@extends('layouts_admin.app')

@section('title', 'Pending Event Admins')

@section('content')
<div class="container">
    <h1 class="text-center">Pending Event Admins</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventAdmins as $eventAdmin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $eventAdmin['id'] }}</td>
                            <td>{{ $eventAdmin['username'] }}</td>
                            <td>{{ $eventAdmin['fullName'] }}</td>
                            <td>{{ $eventAdmin['email'] }}</td>
                            <td>{{ $eventAdmin['status'] }}</td>
                            <td>
                                <form action="{{ route('admin.eventadmin.reject', $eventAdmin['username']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Từ chối</button>
                                </form>
                                <form action="{{ route('admin.eventadmin.approve', $eventAdmin['username']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Duyệt</button>
                                </form>
                                <a href="{{ route('admin.adminevent.detail',  $eventAdmin['username']) }}" class="btn btn-sm btn-info">Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
