<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportContact;
use App\Exports\ExportContact;
use App\Models\Listing;

use App\Models\User;

class CommentController extends Controller
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
        $data = Comment::orderBy('id', 'desc')->get();
        
        return view('comments.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  $listing = Listing::find($id);
        //return view('paid.show', ['paid' => $paid]);
        return view('comments.create', ['listing' => $listing]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
      
 /*
        if ($request->hasFile('file')) {
            $imageName = time().'.'. $request->file->extension();
            $request->file->storeAs('public/images',$imageName);
            $commentData=['file'=>$imageName];
      
                  
                    }
          
       
         $select = $request->get('activity');
        $data=['note'=>$request->note ,'activity'=>$request->get('activity'),'user_id'=>$request->user_id,'listing_id'=>$request->listing_id,'file'=>$imageName ];
        $comment = Comment::create( $data);
        
        return redirect()->route('comments.index');

*/

        $request->validate([
            'activity' => 'required',
      
        ]);

        $input = $request->all();
     
        $input['activity'] = $request->input('activity');
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
        $comment = Comment::create( $input);   
       // $product->update($input);

        return redirect()-> route('listings.show', $comment->listing->id)
                      ->with('success','comments created successfully');
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

        return view('comments.show', compact('comment'));
    }
    public function usercomment($id)
    {
        $uses = User::find($id);
$comment= $uses->Comments;
        return view('comments.show', compact('comment'));
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

        return view('comments.edit',compact('comment'));
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
