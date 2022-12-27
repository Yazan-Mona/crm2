<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\User;
use App\Models\Project;
use Datatables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportOwner;
use App\Exports\ExportOwner;

class OwnerController extends Controller
{

     /**
    * create a new instance of the class
    *
    * @return void
    */
    function __construct()
    {
         $this->middleware('permission:owner-view', ['only' => ['index','store']]);
         $this->middleware('permission:owner-show', ['only' => ['show']]);
         $this->middleware('permission:owner-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:owner-create', ['only' => ['create','store']]);
         $this->middleware('permission:owner-delete', ['only' => ['destroy']]);
         $this->middleware('permission:contact-followup', ['only' => ['destroy']]);
 
 
 
    }


 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Owner::orderBy('id', 'desc')->get();
        
        return view('owners.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id', 'desc')->get();
        $data = Project::orderBy('id', 'desc')->get();
        return view('owners.create', compact('users'))->with ('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = Owner::create($request->all());
        
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Owner::find($id);

        return view('owners.show', compact('owner'));
    }

    public function list()
    {
        $owner = Owner::find(1)->user;

        return view('testdata')->with ('data',$owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::find($id);
        $users = User::orderBy('id', 'desc')->get();

        return view('owners.edit',compact('owner'))->with ('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $owner = Owner::find($id);
    
        $owner->update($request->all());
    
        return redirect()->route('owners.index')
            ->with('success', 'Owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::find($id)->delete();
    
        return redirect()->route('owners.index')
            ->with('success', 'Owner deleted successfully.');
    }



    /////// import and export excel start ////

    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportOwner, $request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportOwners(Request $request){
        return Excel::download(new ExportOwner, 'owners.xlsx');
    }


    /////// import and export excel end ////
}
