<?php

namespace App\Http\Controllers;
use App\Models\ProjectFile;
use Illuminate\Http\Request;

class projectFileController extends Controller
{
  

     /**
    * create a new instance of the class
    *
    * @return void
    */
    function __construct()
    {
         $this->middleware('permission:comment-view', ['only' => ['index','store']]);
         $this->middleware('permission:comment-show', ['only' => ['show']]);
         $this->middleware('permission:comment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:comment-create', ['only' => ['create','store']]);
         $this->middleware('permission:comment-delete', ['only' => ['destroy']]);
         $this->middleware('permission:contact-followup', ['only' => ['destroy']]);
 
 
 
    }
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $data = ProjectFile::orderBy('id', 'desc')->get();
         
         return view('projectFiles.index', compact('data'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create($id)
     { 
         return view('projectFiles.create');
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
             'project_name' => 'required',
       
         ]);
 
         $input = $request->all();
      
      
         if ($ExteriorStreet = $request->file('ExteriorStreet')) {
             $destinationPath = 'image/ExteriorStreet/';
             $proExteriorStreet = date('YmdHis') . "." . $ExteriorStreet->getClientOriginalExtension();
             $image->move($destinationPath, $profileImage);
             $input['ExteriorStreet'] = "$proExteriorStreet";
         }else{
             unset($input['ExteriorStreet']);
         }
         $projectfile = ProjectFile::create( $input);   
      
 
         return redirect()->route('projectfiles.index');

         }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $comment = Comment::find($id);
 
         return view('projectFiles.show', compact('comment'));
     }
     public function usercomment($id)
     {
         $uses = User::find($id);
 $comment= $uses->Comments;
         return view('projectFiles.show', compact('comment'));
     }
     
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $comment = Comment::find($id);
 
         return view('projectFiles.edit',compact('comment'));
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
 
         $comment = Comment::find($id);
         $input = $request->all();
 
         if ($image = $request->file('image')) {
             $destinationPath = 'image/';
             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
             $image->move($destinationPath, $profileImage);
             $input['file'] = "$profileImage";
         }else{
             unset($input['file']);
         }
         $comment->update($input);
      
         return redirect()-> route('listings.show', $comment->listing->id)
             ->with('success', 'Comment updated successfully.');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         Comment::find($id)->delete();
     
         return redirect()->back()
             ->with('success', 'Comment deleted successfully.');
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
