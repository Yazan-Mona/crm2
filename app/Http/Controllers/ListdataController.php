<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\User;
use App\Models\Listdata;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportOwner;
use App\Exports\ExportOwner;
class ListdataController extends Controller
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
        $data = Listdata::orderBy('id', 'desc')->get();
        
        return view('listdata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('listdata.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = Listdata::create($request->all());
        
        return redirect()->route('listdatas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Listdata::find($id);

        return view('listdata.show', compact('owner'));
    }

    public function list()
    {
        $owner = Listdata::find(1)->user;

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
        $owner = Listdata::find($id);
        $users = User::orderBy('id', 'desc')->get();

        return view('listdata.edit',compact('owner'))->with ('users',$users);
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

        $owner = Listdata::find($id);
    
        $owner->update($request->all());
    
        return redirect()->route('listdata.index')
            ->with('Success', 'Owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listdata::find($id)->delete();
    
        return redirect()->route('listdata.index')
            ->with('success', 'List Data deleted successfully.');
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
        return Excel::download(new ExportOwner, 'listdata.xlsx');
    }


    /////// import and export excel end //////
}
