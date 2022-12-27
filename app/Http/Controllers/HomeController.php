<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Contact;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Project;
use DB;
use App\Models\Chart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = Listing::orderBy('id', 'desc')->take(5)->get();
        $last_user = User::orderBy('id', 'desc')->take(3)->get();
        $Total_listing = Listing::count();
        $Total_project = Project::count(); 
        $Total_lead = Contact::where('status','Lead')->count();
        $Total_user = User::count(); 


//chart ///
        $groups = DB::table('listings')->join('projects', 'projects.id', '=', 'listings.project_id')
        ->select('type', DB::raw('count(*) as total','community'))
        ->groupBy('type')
        ->pluck('total', 'type','community')->all();
// Generate random colours for the groups
for ($i=0; $i<=count($groups); $i++) {
   $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
 
   //$colours[] = '#' .  '0c67c9'.$c*7;
   
}
// Prepare the data for returning with the view
$chart = new Chart;
$chart->labels = (array_keys($groups));
$chart->dataset = (array_values($groups));
$chart->colours = $colours;


        return view('home', compact('data'))->with('last_user', $last_user)->with('Total_listing', $Total_listing)->with('chart', $chart)->with('Total_project', $Total_project)->with('Total_user', $Total_user)->with('Total_lead', $Total_lead);
    }
}
