<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Proimage;
use App\Models\Listing;
use Illuminate\Http\Request;
use Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProject;
use App\Exports\ExportProject;


class ProjectController extends Controller
{

     /**
    * create a new instance of the class
    *
    * @return void
    */
    function __construct()
    {
         $this->middleware('permission:project-view', ['only' => ['index','store']]);
         $this->middleware('permission:project-show', ['only' => ['show']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
         $this->middleware('permission:contact-followup', ['only' => ['destroy']]);
 
 
 
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::orderBy('id', 'desc')->get();
        
        return view('projects.index', compact('data'));
    }

    public function test()
    {
       // $project = Project::orderBy('id', 'desc')->get();
 
        $project = project::findOrFail(2)->listings;
      //  $listings =  $project->listings;
        return view('testdata')->with ('data',$project);
        //return view('projects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $input = $request->all();


        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['main_image'] = $profileImage;
        }
    
        $project = Project::create($input);
     


        if ($request->hasfile('filename')){
            $images= $request->file('filename');
            $i=0;
            foreach ($images as $image){
                $destinationPath = 'image/' ;
                $profileImage = date('YmdHis').$i.".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                Proimage::create([
                    'project_id' =>  $project->id,
                    'filename'   =>  $profileImage
                ]);
                $i++;
            }
        }
 
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('projects.show', compact('project'));
    }

    ///  get all listings of this project  start ///
    public function listings($id)
    {
        $project = Project::find($id);
       $data = $project->listings;
       // $data = Listing::orderBy('id', 'desc')->get();
        
       // return view('projects.Listings', compact('data'));
        return view('listings.index', compact('data'));
    }
    ///  get all listings of this project  end ///
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects.edit',compact('project'));
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

        $project = Project::find($id);
        $input = $request->all();

        if($request->file('img')) {

            $input['main_image'] = 1;
        }
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['main_image'] = $profileImage;
        }
        $project->update($input);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('image/'), $filename);
            $project->main_image = $request->file('image')->getClientOriginalName();
        }
    
        $project->update();
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }




////////////////////


public function updateimage(Request $request, $id)
{
    $project = Project::find($id);
    $input = $request->all();

  

    //    $input['main_image'] = $request->file('test');


        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('image/'), $filename);
            $project->main_image = $request->file('image')->getClientOriginalName();
        }
    
        $project->update();

    //$input['main_image'] = 2;
   // $project->update($input);

    return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
}


//////////////////////








    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
    
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }



    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportProject, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportProjects(Request $request){
        return Excel::download(new ExportProject, 'projects.xlsx');
    }

  ///  get all images of this project  start ///
    public function Images($id)
    {
        $project = Project::find($id);
        $images = Proimage::where('project_id', $id)->get();
     
        return view('projects.images', compact('images'))->with('id',$id);
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
                Proimage::create([
                    'project_id' =>  $id,
                    'filename'   =>  $profileImage
                ]);
                $i=$i+1;
            }
        }
        $project = Project::find($id);

        return view('projects.show', compact('project'));
        }
///   Add more images of this Listing  end ///   
    public function image_show($id)
    {
        $image = Proimage::find($id);

        return view('projects.img', compact('image'));
    }

    

    public function image_edit ($id)
    {
        $image = Proimage::find($id);

        return view('projects.imgedit',compact('image'));
    }



    public function image_update(Request $request, $id)
    {

        $project = Proimage::find($id);
        $input = $request->all();

       
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('image/'), $filename);
            $project->filename = $request->file('image')->getClientOriginalName();
        }
    
        $project->update();
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }


}
