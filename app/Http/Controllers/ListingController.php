<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportListing;
use App\Exports\ExportListing;
use Auth;
class ListingController extends Controller
{


     /**
    * create a new instance of the class
    *
    * @return void
    */
    function __construct()
    {
         $this->middleware('permission:listing-view', ['only' => ['index','store']]);
         $this->middleware('permission:listing-show', ['only' => ['show']]);
         $this->middleware('permission:listing-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:listing-create', ['only' => ['create','store']]);
         $this->middleware('permission:listing-delete', ['only' => ['destroy']]);
       
 
 
 
    }


  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Listing::where('fresh','0')->orderBy('id', 'desc')->get();
        
        return view('listings.index', compact('data'));
    }


    public function indexUnFresh()
    {
        $data = Listing::where('fresh','1')->orderBy('id', 'desc')->get();
        
        return view('listings.indexUnfresh', compact('data'));
    }


    public function list()
    {
        $data = Listing::orderBy('id', 'desc')->get();
        
        return view('listings.index', compact('data'));
    }

    public function imagesa()
    {
        $imageData = image::orderBy('id', 'desc')->get();
        
        return view('testdata', compact('imageData'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Project::orderBy('id', 'desc')->get();
        $user = Auth::user();
        if ( Auth::user()->getRoleNames()[0]== "admin"){
            $owners = Owner::orderBy('id', 'desc')->get();

        }else{     
            $owners=Owner::where('user_id', $user->id)->get();
        }

        return view('listings.create' , compact('data'))->with('owners',$owners);
    }


    
    public function createByOwner(Request $request)
    {
        $data = Project::orderBy('id', 'desc')->get();
        $user = Auth::user();
        if ( Auth::user()->getRoleNames()[0]== "admin"){
            $owners = Owner::orderBy('id', 'desc')->get();

        }else{     
            $owners=Owner::where('user_id', $user->id)->get();
        }
        $unitNo= $request->unitNo;
        $project_id= $request->project_id;
        $id= $request->owner_id;
        $owner=Owner::where('id', $id)->get();
        $project=Project::where('id', $project_id)->get();
        return view('listings.create2' , compact('data'))->with('owners',$owners)->with('unitNo',$unitNo)->with('project',$project)->with('owner',$owner);
    }


    public function createimg()
    {
        return view('addimage');
    }
    public function saveimg(Request $request)
    {  $i=0;
        if ($request->hasfile('filename')){
        $images= $request->file('filename');
            foreach($request->file('filename') as $image){
            $destinationPath = 'image/' ;
            $profileImage = date('YmdHis').$i.".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            Image::create([
                'listing_id' =>  2,
                'filename'   =>  $profileImage
            ]);
            $i=$i+1;
        }
    }
        return view('addimage');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $input = $request->all();


        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['main_image'] = $profileImage;
        }
    
        $listing = Listing::create($input);


        if ($request->hasfile('filename')){
            $images= $request->file('filename');
            $i=0;
                foreach($request->file('filename') as $image){
                $destinationPath = 'image/' ;
                $profileImage = date('YmdHis').$i.".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                Image::create([
                    'listing_id' =>  $listing->id,
                    'filename'   =>  $profileImage
                ]);
                $i=$i+1;
            }
        }
        return redirect()->route('listings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        //$comments = Comment::paginate(5);
        $comments=  $listing->comments;
        return view('listings.show', compact('listing'))->with('comments',$comments);
        //return view('comments.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        $data = Project::orderBy('id', 'desc')->get();
        $user = Auth::user();
        if ( Auth::user()->getRoleNames()[0]== "admin"){
            $owners = Owner::orderBy('id', 'desc')->get();

        }else{     
            $owners=Owner::where('user_id', $user->id)->get();
        }
        $users = User::orderBy('id', 'desc')->get();
        return view('listings.edit',compact('listing'))->with('owners',$owners)->with('data',$data)->with('users',$users);
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

        $listing = Listing::find($id);

        $input = $request->all();
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['main_image'] = $profileImage;
        }
        $listing->update($input);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('image/'), $filename);
            $listing->main_image = $request->file('image')->getClientOriginalName();
        }
    
        $listing->update();
        return redirect()->route('listings.index')
            ->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listing::find($id)->delete();
    
        return redirect()->route('listings.index')
            ->with('success', 'Listing deleted successfully.');
    }



    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportListing, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportListings(Request $request){
        return Excel::download(new ExportListing, 'listings.xlsx');
    }

      ///  get all images of this Listing  start ///
      public function Images($id)
      {
          $project = Listing::find($id);
          $images = Image::where('listing_id', $id)->get();
       
          return view('listings.images', compact('images'))->with('id',$id);
      }
  
       ///  get all images of this project  end ///

             ///   Add more images of this Listing  start ///
      public function addMoreImage(Request $request,$id)
      {
      
        if ($request->hasfile('filename')){
            $images= $request->file('filename');
            $i=0;
                foreach($request->file('filename') as $image){
                $destinationPath = 'image/' ;
                $profileImage = date('YmdHis').$i.".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                Image::create([
                    'listing_id' =>  $id,
                    'filename'   =>  $profileImage
                ]);
                $i=$i+1;
            }
        }
        $listing = Listing::find($id);
        return view('listings.show', compact('listing'));
        }
             ///   Add more images of this Listing  end ///


   ///   Add  Listing to Un fresh  end ///
             public function makeUnfresh(Request $request)
             {
                 $id= $request->id;
       
               
           
                 Listing::where('id',$id)->update(array('fresh' =>'1'));
                 
                 return redirect()->route('listings.index')
                     ->with('success', 'listings updated successfully.');
             }
         
           ///   Add  Listing to fresh  end ///
           public function makefresh(Request $request)
           {
               $id= $request->id;
     
             
         
               Listing::where('id',$id)->update(array('fresh' =>'0'));
               
               return redirect()->route('listings.index')
                   ->with('success', 'listings updated successfully.');
           }


///   Add more images of this Listing  end ///   
public function image_show($id)
{
    $image = Image::find($id);

    return view('listings.img', compact('image'));
}



public function image_edit ($id)
{
    $image = Image::find($id);

    return view('listings.imgedit',compact('image'));
}



public function image_update(Request $request, $id)
{

    $listing = Image::find($id);
    $input = $request->all();

   
    if($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('image/'), $filename);
        $listing->filename = $request->file('image')->getClientOriginalName();
    }

    $listing->update();
    return redirect()->route('listings.index')
        ->with('success', 'listing updated successfully.');
}


public function image_delete($id)
{
    Image::find($id)->delete();

    return redirect()->route('listings.index')
        ->with('success', 'Listing deleted images successfully.');
}


public function owner_listing(Request $request)
{
    $listing = Listing::where('owner_id', $request->owner_id)->get();
    //$comments = Comment::paginate(5);

    $data = Listing::where('fresh','0')->where('owner_id', $request->owner_id)->where('user_id',$request->user_id)->orderBy('id', 'desc')->get();
        
    return view('listings.index', compact('data'));
   // return view('listings.show', compact('listing'))->with('comments',$comments);
    //return view('comments.index', compact('data'));
}
}