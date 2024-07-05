@extends('layouts_admin.app')

@section('title', 'Event Admin List')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success" id="successMessage" style="display: block;">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
        </script>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" id="errorMessage" style="display: block;">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('errorMessage').style.display = 'none';
            }, 5000);
        </script>
    @endif
    <h1 class="text-center">Event Admin List</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Business Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Tax Code</th>
                    <th>Head Office</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventAdmins as $index => $eventAdmin)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $eventAdmin['username'] }}</td>
                        <td>{{ $eventAdmin['businessName'] }}</td>
                        <td>{{ $eventAdmin['phoneNumber'] }}</td>
                        <td>{{ $eventAdmin['email'] }}</td>
                        <td>{{ $eventAdmin['taxCode'] }}</td>
                        <td>{{ $eventAdmin['headOffice'] }}</td>
                        <td>
                            <a href="{{ route('admin.adminevent.detail',  $eventAdmin['email']) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/admin_events.css') }}">
@endpush
