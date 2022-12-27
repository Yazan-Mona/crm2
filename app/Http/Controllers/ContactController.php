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
class ContactController extends Controller
{


    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:contact-view', ['only' => ['index','store']]);
         $this->middleware('permission:contact-show', ['only' => ['show']]);
         $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
         $this->middleware('permission:contact-followup', ['only' => ['destroy']]);


 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data = Contact::orderBy('id', 'desc')->get();
        $data = DB::table('contacts')
                    ->where('status','Basic')
                    ->orWhere('status', 'Open Lead')
                    ->get();

        return view('contacts.index', compact('data'));
    }



    /**
     * Display a  leads contact of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLead()
    {

        $data = DB::table('contacts')
                    ->where('status','Lead')
                    ->get();
        return view('contacts.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('contacts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$contact = Contact::create($request->all());
        
        $input = $request->all();
     

        if ($image = $request->file('file')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
        $contact = Contact::create( $input);   



        return redirect()->route('contacts.index');
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

        return view('contacts.show', compact('contact'))->with('followups',$followups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $users = User::orderBy('id', 'desc')->get();
        $contact = Contact::find($id);
        return view('contacts.edit',compact('contact'))->with('users',$users);
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
    
        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    public function makeLead(Request $request)
    {
        $id= $request->id;
        Contact::where('id',$id)->update(array('status' =>'Lead'));
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
    
        return redirect()->route('contacts.index')
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
        return Excel::download(new ExportContact, 'contacts.xlsx');
    }
}
