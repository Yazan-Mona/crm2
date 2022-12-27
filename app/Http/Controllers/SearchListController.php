<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Auth;
use App\Models\Listing;
use Illuminate\Http\Request;

class SearchListController extends Controller
{
    public function index(Request $request)
    {   
        $user = Auth::user();
        //$project = Project::find($user->id);
       //$data = $user->Listings;
       $data = Listing::where('user_id',$user->id)->where('fresh','0')->orderBy('id', 'desc')->get();
       // $data = Listing::orderBy('id', 'desc')->get();
        
       // return view('projects.Listings', compact('data'));
        return view('listings.index', compact('data'));
    }


    public function  list(Request $request)
    {
        $project = Project::find($request->id);
       $data = $project->listings;
       // $data = Listing::orderBy('id', 'desc')->get();
        
       // return view('projects.Listings', compact('data'));
        return view('listings.index', compact('data'));
    }
}
