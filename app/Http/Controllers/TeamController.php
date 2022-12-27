<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:team-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:team-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Team::orderBy('id', 'desc')->get();

        return view('teams.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
    
        Team::create($input);
    
        return redirect()->route('teams.index')
            ->with('success','Team created successfully .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);

        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);

        return view('teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        
        ]);

        $team = Team::find($id);
    
        $team->update($request->all());
    
        return redirect()->route('teams.index')
            ->with('success', 'Team updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::find($id)->delete();
    
        return redirect()->route('teams.index')
            ->with('success', 'Team deleted successfully.');
    }

    

    public function  my_team(Request $request)
    {
        $team = Team::find($request->id);
       $data = $team->users;
       // $data = Listing::orderBy('id', 'desc')->get();
        
       // return view('projects.Listings', compact('data'));
        return view('teams.myteam', compact('data'));
    }

    
    public function  my_team_contact(Request $request)
    {
       $user = User::find($request->id);
       $data = $user->Contacts;
       // $data = Listing::orderBy('id', 'desc')->get();
        
       // return view('projects.Listings', compact('data'));
        return view('teams.contact', compact('data'));
    }
    public function  my_team_lead(Request $request)
    {
        $user = User::find($request->id);
        $data = $user->Contacts;
        
       // $data = Listing::orderBy('id', 'desc')->get();
        
       // return view('projects.Listings', compact('data'));
        return view('teams.lead', compact('data'));
    }
}
