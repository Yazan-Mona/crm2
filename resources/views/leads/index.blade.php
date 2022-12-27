@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

@section('content')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">



    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">

            <span class="float-right">
            <a class="btn btn-primary" href="{{ route('leads.create') }}">New Lead</a>
                </span>

            </div>
        
           
            <div class="card-body">
            <div class="table-responsive">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>

                            <th>Email</th>
                            <th>nationality</th>
                            <th>source</th>
                            <th>assign_to</th>
                            <th>mobile</th>
                            <th>alternate_mobile</th>
                            <th >State</th> 
                            <th >Make It Lead</th> 
                            <th width="280px">Action</th> 
           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $contact)
                    @if ($contact->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")
                    <tr>
                    <td>
                            {{ $contact->firstname ?? '' }}
                        </td>
                        <td>
                            {{ $contact->lastname ?? '' }}
                        </td>
                        <td>
                            {{ $contact->email ?? '' }}
                        </td>
                        <td>
                            {{  $contact->nationality ?? '' }}
                        </td>
                        <td>
                            {{ $contact->source ?? '' }}
                        </td>

                        <td>
                            {{ $contact->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $contact->mobile ?? '' }}
                        </td>
                        <td>
                            {{ $contact->alternate_mobile ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success">{{ $contact->lead_status ?? '' }}</span>
                        </td>
                        <td>
                        <form action="{{ route('lead.basic')}}" method="POST" >
                             @csrf
                             @method('PUT')
                                <input type="hidden" name="id" value="{{$contact->id}}">
                               
                                <button type="submit" class="btn btn-outline-primary bi-person-check-fill">
                                 
                                </button>
                            </form>
                        </td>
                        <td>
                        @can('lead-view')
                        <a class="btn btn-primary  bi-eye" href="{{ route('leads.show', $contact->id) }}"></a>
                        @endcan

                        @can('lead-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('leads.edit', $contact->id) }}"></a>
                        @endcan

                        @can('followup-create')
                        <a class="btn btn-success  bi-chat-dots" href="{{ route('lead_followup', $contact->id) }}"></a>
                        @endcan

                        @can('lead-delete')
                        <form action="{{ route('leads.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan

                                </td>
                         
                                
                    </tr>
                    @endif    
                    @endforeach
                    
                        
                        


                    </tbody>
                </table>
              </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
    @if (Auth::user()->getRoleNames()[0]== "admin")
<!-- Basic Tables start -->
<form action="{{ route('import-leads') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <table class="table   table  " id="table1">
                            <tr>

                            </tr>
                            <td><input type="file" name="file" class="form-control" id="customFile"></td>
                            <td><button class="btn btn-primary">Import   Leads </button></td>
                            <td><a class="btn btn-success " href="{{ route('export-leads') }}">Export Leads </a></td>
           

                    </table>
    </form>
<!-- Basic Tables end -->
    @endif
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>


@endsection
