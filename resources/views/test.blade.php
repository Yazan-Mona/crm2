
@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Datatable Jquery - Mazer Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<style>
    table.dataTable td{
        padding: 15px 8px;
    }
    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            <button type="button" class="btn btn-primary">Add New</button>
            <button type="button" class="btn btn-primary  bi-eye"></button>
            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('contacts.create') }}">New contact</a>
                </span>
            </div>
        
           
            <div class="card-body">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>

                            <th>Email</th>
                            <th>nationality</th>
                            <th>source</th>
                            <th>lead_status</th>
                            <th>assign_to</th>
                            <th>mobile</th>
                            <th>alternate_mobile</th>
                            <th>Status</th>
                            <th width="280px">Action</th> 
              
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $contact)
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
                            {{ $contact->lead_status ?? '' }}
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
                                <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                        <a class="btn btn-primary  bi-eye" href="{{ route('contacts.show', $contact->id) }}"></a>

                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('contacts.edit', $contact->id) }}"></a>
                        <a class="btn btn-success  bi-chat-dots"></a>
              
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                    
                          
                                </td>
                                    <td>
                                </td>
                    </tr>   
                    @endforeach
      
    
                        
                        
        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
    
    <!-- Input Style end -->
    @endsection
