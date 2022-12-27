


@extends('layouts.admin')
@section('content')
@can('team-view') 
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
            <div class="card-header">
      <!--          <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.create') }}">New User</a>
                </span>
        -->
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Team Roles</th>
                            <th width="180px">contact</th>
                            <th width="180px">lead</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $val)
                                           <!-- <label class="badge badge-dark">{{ $val }}</label>-->
                                            <label class=" badge-dark">{{ $val }}</label>

                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->team_role }}</td>


                                <td>
                            <form action="{{ route('My.team.contact') }}" method="get" style="display: inline-block;">
                            <input type="hidden" id="id" name ="id" class="form-control round" value="{{$user->id}}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                            <button type="submit" class="btn btn-primary bi-person-check-fill">
                                
                            </button>

                            </form>
</td>
                            <td>
                            <form action="{{ route('My.team.lead') }}" method="get" style="display: inline-block;">
                            <input type="hidden" id="id" name ="id" class="form-control round" value="{{$user->id}}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                            <button type="submit" class="btn btn-success  bi-building btn btn-outline-primary bi-person-check-fill">
                                
                            </button>
                            </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
</div>
@endcan
@endsection