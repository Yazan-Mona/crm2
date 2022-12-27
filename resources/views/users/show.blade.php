@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="assets/css/bootstrap.css">
<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">User
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
                <div class="lead">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
                <div class="lead">
                    <strong>Password:</strong>
                    ********
                </div>
            </div>
        </div>
    </div>
</div>
@endsection