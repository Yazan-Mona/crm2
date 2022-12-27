<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>
@extends('layouts.admin')

<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
@section('content')
<script>
var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'sales',
		data: [19,20,30,20,10,20,30,20,10,20,30,20]
	}],
	colors: '#435ebe',
	xaxis: {
		categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
	},
}
var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visitt"), optionsProfileVisit);

</script>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Projects</h6>
                                    <h6 class="font-extrabold mb-0">{{$Total_project}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Users</h6>
                                    <h6 class="font-extrabold mb-0">{{$Total_user}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                    
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total listing</h6>
                                    <h6 class="font-extrabold mb-0">{{$Total_listing}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Open Leads</h6>
                                    <h6 class="font-extrabold mb-0">{{$Total_lead}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">

                           <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Latest listings</h4>
                    </div>
                    <div class="card-content">
                   
                        <!-- table striped -->
                        <div class="table-responsive">


                        <div class="card-body  ">
            <div class="table-responsive">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                        <th>Image</th>
                            <th>title</th>
                            <th>type</th>

                            <th>rent_pricing</th>
                            <th>price</th>
                            <th>beds</th>
                            <th>baths</th>
                            <th>plotarea_size</th>
                            <th>area_size</th>
                            <th>developer</th>
                            <th>Status</th>
                            <th>note</th>
                            <th>Description</th>
                            <th>Unit No</th>
                            <th>User Name</th>
                            @if ( Auth::user()->getRoleNames()[0]== "admin")
                            <th>owner id</th>
                            @endif
                            <th>Project Name</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $listing)
             
                    <tr>
                        <td>
                        <img src="{{ asset('/image/'.$listing->main_image) }}"    width= "120px"
                                    aspect-ratio= "auto 120 / 100" height= "100px">
                        </td>
                        <td>
                            {{ $listing->title ?? '' }}
                        </td>
                        <td>
                            {{ $listing->type ?? '' }}
                        </td>
                        <td>
                            {{ $listing->rent_pricing ?? '' }}
                        </td>
                        <td>
                            {{  $listing->price ?? '' }}
                        </td>
                        <td>
                            {{ $listing->beds ?? '' }}
                        </td>
                        <td>
                            {{ $listing->baths ?? '' }}
                        </td>

                        <td>
                            {{ $listing->plotarea_size ?? '' }}
                            {{ $listing->plotarea_size_postfix ?? '' }}
                        </td>
                        <td>
                            {{ $listing->area_size ?? '' }}
                            {{ $listing->area_size_postfix ?? '' }}
                        </td>
                        <td>
                            {{ $listing->developer ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success">Active</span>
                        </td>
                        <td>
            
                        {{ substr($listing->note, 0,  50) }}
                        </td>                        <td>
                         
                            {{ substr($listing->description, 0,  50) }}
                        </td>
                       
                        <td>
                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")
                            {{ $listing->unitNo ?? '' }}
                        @endif
                        </td>

                        <td>
                            {{ $listing->user_id ?? '' }}
                        </td>                   
                        @if ( Auth::user()->getRoleNames()[0]== "admin")
                        
                        <td>
                            {{ $listing->owner_id ?? '' }}
                         
                        </td> 

                        @endif                     
                        <td>
                            {{ $listing->project_id ?? '' }}
                        </td>
                        <td>

                        @can('listing-show')
                        <a class="btn btn-primary  bi-eye" href="{{ route('listings.show', $listing->id) }}"></a>
                        @endcan
                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")
                        @can('listing-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('listings.edit', $listing->id) }}"></a>
                        @endcan

                        @can('comment-create')
                        <a class="btn btn-success  bi-chat-dots" href="{{ route('listing_comment', $listing->id) }}"></a>
                        @endcan

                        @can('listing-delete')
                        <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan

                          
                        </td>
                        @endif  
                    </tr> 
                  
                    @endforeach
                      

                    </tbody>
                </table>
            </div>
        </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
                    </div>
                </div>
            </div>


      <!--         <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Listing locations</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visitt"></div>
                        </div>
                    </div>
                </div>
            </div>
 -->
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-primary" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="{{asset("/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill")}}" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Europe</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">862</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-europe"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="{{asset("/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill")}}" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">America</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">375</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-america"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-danger" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="{{asset("/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill")}}" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">1025</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-indonesia"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="{{asset("/assets/images/faces/5.jpg")}}")}}">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="{{asset("/assets/images/faces/2.jpg")}}")}}">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                                    this design?</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
        <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{asset("/assets/images/faces/1.jpg")}}" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"> {{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->getRoleNames()[0] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent User</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach($last_user as $user)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{asset("/assets/images/faces/4.jpg")}}">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1"> {{$user->name}}</h5>
                            <h6 class="text-muted mb-0">{{$user->getRoleNames()[0]}}</h6>
                        </div>
                    </div>
                    @endforeach


                 <!--   <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{asset("/assets/images/faces/5.jpg")}}">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Dean Winchester</h5>
                            <h6 class="text-muted mb-0">@imdean</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{asset("/assets/images/faces/1.jpg")}}">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">John Dodol</h5>
                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                        </div>
                    </div>

-->

                    <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                            Conversation</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data percentage</h4>
                </div>
                <div class="card-body">
                    <div >
                   

         
                                            <canvas id="userChart" class="rounded shadow"></canvas>
            
      
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page-content">
</div>






    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- CHARTS -->
<script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
// The data for our dataset
        data: {
            labels:  {!!json_encode($chart->labels)!!} ,
            datasets: [
                {
                    label: 'Count of ages',
                    backgroundColor: {!! json_encode($chart->colours)!!} ,
                    data:  {!! json_encode($chart->dataset)!!} ,
                },
            ]
        },
// Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 22,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });


@endsection
