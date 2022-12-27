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
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('teams.create') }}">New Team</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>##</th>
                            <th>Name</th>

                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $team)
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td>{{ $team->name }}</td>

                                <td>
                                    <a class="btn btn-success" href="{{ route('teams.show',$team->id) }}">Show</a>
                                    @can('team-edit')
                                        <a class="btn btn-primary" href="{{ route('teams.edit',$team->id) }}">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['teams.destroy', $team->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan

                                <!--    <a class="btn btn-outline-primary bi-person-check-fill" href="{{ route('My.team',$team->id) }}"></a> -->

                                    <form action="{{ route('My.team') }}" method="get" style="display: inline-block;">
                            <input type="hidden" id="id" name ="id" class="form-control round" value="{{$team->id}}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                            <button type="submit" class="btn btn-success  bi-building">
                                
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

@endsection