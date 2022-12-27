@extends('layouts.admin')
@section('content')
@if ($contact->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table with outer spacing</h4>
                    
                        <a class="btn btn-primary  " href="{{ route('leads.index', $contact->id) }}">Back To Lead List</a>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
      
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg  table-bordered ">
                                    <thead>
                                        <tr>
                                            <th  class="col-12 col-md-6" >NAME</th>
                                            <th class="col-12 col-md-6" >RATE</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">firstname</td>
                                            <td class="text-bold-500">  {{ $contact->firstname }}</td>
                           

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">lastname</td>
                                            <td> {{ $contact->lastname}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">mobile</td>
                                            <td> {{ $contact->mobile }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">email</td>
                                            <td> {{ $contact->email }}</td>
                     

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">nationality</td>
                                            <td> {{ $contact->nationality }}</td>
                              

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">source</td>
                                            <td> {{ $contact->source }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">status</td>
                                            <td> {{ $contact->status }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">created_by</td>
                                            <td> {{ $contact-> created_by}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">alternate_mobile</td>
                                            <td> {{ $contact->alternate_mobile }}</td>
                             

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Basic Tables end -->

@endif

    @can('followup-view')
  <!-- followup  Tables start -->
  @if ($contact->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")



  <section class="section">
        <div class="card">
            <div class="card-header">
            @can('followup-create')
            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('lead_followup', $contact->id) }}">Add New Follow Up</a>
                </span>
            @endcan
            </div>

           
            <div class="card-body">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                        <th>No</th>
                            <th>Image</th>
                            <th>activity</th>
                            <th>note</th>

                            <th>file</th>
                            <th>user_id Name</th>

                            <th>contact_id</th>
                            <th>created_at</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($followups as $key => $followup)
                    <tr>
                    <td>{{ $followup->id ?? '' }}</td>

                    <td><img src="/image/{{ $followup->file }}" width="100px"></td>
                    <td>
                            {{ $followup->activity ?? '' }}
                        </td>
                        <td>
                            {{ $followup->note ?? '' }}
                        </td>
                        <td>
                            {{ $followup->file ?? '' }}
                        </td>
                        <td>
                            {{ $followup->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $followup->contact_id ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success"> {{ $followup->created_at ?? '' }}</span>
                        </td>
                        <td>

                        @can('followup-view')
                        <a class="btn btn-primary  bi-eye" href="{{ route('followups.show', $followup->id) }}"></a>
                        @endcan

                        @can('followup-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('followups.edit', $followup->id) }}"></a>
                        @endcan
                        


                        @can('followup-delete')
                        <form action="{{ route('followups.destroy', $followup->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan
                                </td>
                         
                                
                    </tr>   
                    @endforeach
                    
                        
                        


                    </tbody>
                </table>
            </div>
        </div>

    </section>
  <!-- followup  Tables end -->
@endif
  @endcan
        
@endsection