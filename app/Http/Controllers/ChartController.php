<?php

namespace App\Http\Controllers;
use App\Models\Project;
use DB;
use App\Models\Chart;
use Illuminate\Http\Request;
use App\User;

use App\Models\Listing;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers =  Listing::with('project')->get()->pluck('project.name', 'id');

        $e =  Listing::with('project')->get('id','project');
        
        $s = Listing::join('projects', 'listings.project_id', '=', 'projects.id')->get();
        //$s=$s[1];
      //  $s=$s->beds;
        $groups = DB::table('listings')->join('projects', 'projects.id', '=', 'listings.project_id')
        ->select('type', DB::raw('count(*) as total','community'))
        ->groupBy('type')
        ->pluck('total', 'type','community')->all();
// Generate random colours for the groups
for ($i=0; $i<=count($groups); $i++) {
   // $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
   $colours[] = '#' .  '0c67c9';
}
// Prepare the data for returning with the view
$chart = new Chart;
$chart->labels = (array_keys($groups));
$chart->dataset = (array_values($groups));
$chart->colours = $colours;

return view('charts.index', compact('chart'))->with('sellers',$e);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
