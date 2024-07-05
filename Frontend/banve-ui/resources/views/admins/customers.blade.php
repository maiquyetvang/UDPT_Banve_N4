@extends('layouts_admin.app')

@section('title', 'Customer List')

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
    <h1 class="text-center">Customer List</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th> <!-- Cột số thứ tự -->
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    {{-- <th>Date of Birth</th>
                    <th>Street</th>
                    <th>District</th>
                    <th>Province</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $index => $customer)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Hiển thị số thứ tự -->
                        <td>{{ $customer['username'] }}</td>
                        <td>{{ $customer['firstName'] }}</td>
                        <td>{{ $customer['lastName'] }}</td>
                        <td>{{ $customer['gender'] }}</td>
                        <td>{{ $customer['phoneNumber'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        {{-- <td>{{ $customer['dateOfBirth'] }}</td>
                        <td>{{ $customer['street'] }}</td>
                        <td>{{ $customer['district'] }}</td>
                        <td>{{ $customer['province'] }}</td> --}}
                        <td>
                            <a href="{{ route('admin.customers.show', $customer['firstName']) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/admin_customers.css') }}">
@endpush
