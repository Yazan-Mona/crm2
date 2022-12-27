<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Followup;
use Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportContact;
use App\Exports\ExportContact;
use App\Models\Contact;

use App\Models\User;

class FollowupController extends Controller
{

    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:followup-view', ['only' => ['index','store']]);
         $this->middleware('permission:followup-show', ['only' => ['show']]);
         $this->middleware('permission:followup-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:followup-create', ['only' => ['create','store']]);
         $this->middleware('permission:followup-delete', ['only' => ['destroy']]);
         $this->middleware('permission:contact-followup', ['only' => ['destroy']]);


 
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Followup::orderBy('id', 'desc')->get();
        
        return view('followups.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  $contact = Contact::find($id);
        //return view('paid.show', ['paid' => $paid]);
        return view('followups.create', ['contact' => $contact]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
      


        $request->validate([
            'activity' => 'required',
      
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
          
       // $product->update($input);
    
        return redirect()->route('comments.test')
                        ->with('input','input');
    }
    public function storeFollowup (Request $request)
    {  
      


        $request->validate([
            'activity' => 'required',
      
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
         $followup = Followup::create( $input);   

if( $followup->contact->status=='Lead'){
        return redirect()->route('leads.show',  $followup->contact->id)
                        ->with('success','followups created successfully');
    }else{
        return redirect()->route('contacts.show',  $followup->contact->id)
                        ->with('success','followups created successfully');
    }


}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $followup = Followup::find($id);

        return view('followups.show', compact('followup'));
    }
    public function usercomment($id)
    {
        $uses = User::find($id);
        $followup= $uses->Comments;
        return view('followups.show', compact('followup'));
      
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $followup = Followup::find($id);

        return view('followups.edit',compact('followup'));
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

        $followup = Followup::find($id);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
        $followup->update($input);
     

        if( $followup->contact->status=='Lead'){
            return redirect()->route('leads.show',  $followup->contact->id)
                            ->with('success','followups created successfully');
        }else{
            return redirect()->route('contacts.show',  $followup->contact->id)
                            ->with('success','followups created successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Followup::find($id)->delete();
    
        return redirect()->back()   
            ->with('success', 'followup deleted successfully.');
    }



    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportContact, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportContact, 'contacts.xlsx');
    }
}
