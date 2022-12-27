<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Followup;
use App\Models\User;

use DB;
use Illuminate\Http\Request;
use Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportContact;
use App\Exports\ExportContact;
class LeadController extends Controller
{


        /**
    * create a new instance of the class
    *
    * @return void
    */
    function __construct()
    {
         $this->middleware('permission:lead-view', ['only' => ['index','store']]);
         $this->middleware('permission:lead-show', ['only' => ['show']]);
         $this->middleware('permission:lead-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lead-create', ['only' => ['create','store']]);
         $this->middleware('permission:lead-delete', ['only' => ['destroy']]);
         $this->middleware('permission:contact-followup', ['only' => ['destroy']]);
 
 
 
    }

    /**
     * Display a  leads contact of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('contacts')
                    ->where('status','Lead')
                    ->get();
        return view('leads.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $users = User::orderBy('id', 'desc')->get();
        return view('leads.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //$input = $request->all();
       // $input['main_image'] = $profileImage;
        $contact = Contact::create($request->all());
        
        return redirect()->route('leads.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $followups= $contact->followups;

        return view('leads.show', compact('contact'))->with('followups',$followups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        $users = User::orderBy('id', 'desc')->get();

        $contact = Contact::find($id);
        return view('leads.edit',compact('contact'))->with('users',$users);
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

        $contact = Contact::find($id);
    
        $contact->update($request->all());
    
        return redirect()->route('leads.index')
            ->with('success', 'Contact updated successfully.');
    }


    public function makeBasic(Request $request)
    {
        $id= $request->id;
        Contact::where('id',$id)->update(array('status' =>'Basic'));
        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
    
        return redirect()->route('leads.index')
            ->with('success', 'Contact deleted successfully.');
    }



    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportContact, $request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportContacts(Request $request){
        return Excel::download(new ExportContact, 'leads.xlsx');
    }
}
