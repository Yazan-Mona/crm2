<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SearchListController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\projectFileController;
use App\Http\Controllers\ListdataController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('welcome');
});



///////////get  listing of owner  ////////
Route::get('/owner/listing',[ListingController::class,'owner_listing'])->name('owner.listing');
//Route::get('/my/team/{id}',[TeamController::class,'my_team'])->name('My.team');
Route::get('/my/team',[TeamController::class,'my_team'])->name('My.team');

Route::get('/my/team/lead',[TeamController::class,'my_team_lead'])->name('My.team.lead');
Route::get('/my/team/contact',[TeamController::class,'my_team_contact'])->name('My.team.contact');

///////////create listing of owner  ////////

Route::put('/listing/owner/create',[ListingController::class,'createByOwner'])->name('Make.listing');
//////////////////////

Route::get('/charts', [ChartController::class,'index'])->name('charts');
///////////Images ////////

    ///  get all Images of this project
Route::get('/project/images/{id}',[ProjectController::class,'images'])->name('project_images');

////////// show  one image of project ////////
Route::get('/project/img/show/{id}',[ProjectController::class,'image_show'])->name('pro.img.show');
////////////////
////////// edit image of project ////////
Route::get('/project/img/edit/{id}',[ProjectController::class,'image_edit'])->name('pro.img.edit');

////////////////
////////// edit image of project ////////
Route::put('/project/img/update/{id}',[ProjectController::class,'image_update'])->name('pro.img.update');

////////////////
////////// show image of project ////////
Route::delete('/project/image/{id}',[ProjectController::class,'image_show'])->name('projects_destroy_image');
////////////////


////////// show  one image of listing ////////
Route::get('/listing/img/show/{id}',[ListingController::class,'image_show'])->name('list.img.show');
////////////////
////////// edit image of project ////////
Route::get('/listing/img/edit/{id}',[ListingController::class,'image_edit'])->name('list.img.edit');

////////////////
////////// edit image of project ////////
Route::put('/listing/img/update/{id}',[ListingController::class,'image_update'])->name('list.img.update');

////////////////
////////// show image of project ////////
Route::delete('/listing/image/{id}',[ListingController::class,'image_delete'])->name('listings_destroy_image');
////////////////

////////////////////////

  ///  add more Images of this listing
  Route::post('/project/images/add/{id}',[ProjectController::class,'addMoreImage'])->name('projects-image-add');
////////////////
    ///  get all Images of this listing
    Route::get('/listing/images2/{id}',[ListingController::class,'images'])->name('listing_images');
  ///  add more Images of this listing
    Route::post('/listing/images3/add/{id}',[ListingController::class,'addMoreImage'])->name('listings-image-add');
    Route::put('/lead/basici',[LeadController::class,'makeBasic'])->name('lead.basici2');
/////////// End Images ////////

///test////
Route::resource('leads',LeadController::class);
Route::resource('contacts',ContactController::class);
Route::resource('owners',OwnerController::class);
Route::resource('projects',ProjectController::class);
Route::resource('listings',ListingController::class);
Route::resource('comments',CommentController::class);
Route::resource('followups',FollowupController::class);
Route::resource('my-listings',SearchListController::class);
Route::resource('projectfiles',projectFileController::class);
Route::resource('listdatas',ListdataController::class);
Route::resource('teams',TeamController::class);
////////
Route::put('/contact/lead',[ContactController::class,'makeLead'])->name('contacts.lead');
Route::put('/lead/basic',[LeadController::class,'makeBasic'])->name('lead.basic');

Route::get('/lead/followup/{id}',[FollowupController::class,'create'])->name('lead_followup');
Route::get('/contact/followup/{id}',[FollowupController::class,'create'])->name('contact_followup');
Route::post('/store/followup',[FollowupController::class,'storeFollowup'])->name('create_followup');

Route::put('/Unfresh/listing',[ListingController::class,'makeUnfresh'])->name('Un.fresh.listing');
Route::put('/fresh/listing',[ListingController::class,'makefresh'])->name('fresh.listing');

Route::get('/listing/comment/{id}',[CommentController::class,'create'])->name('listing_comment');
Route::get('/user/comment/{id}',[CommentController::class,'usercomment'])->name('usercomment');
Route::get('/test2',[OwnerController::class,'list']);
Route::get('/view/image',[ListingController::class,'images']);
Route::get('/image/create',[ListingController::class,'createimg'])->name('image-create');
Route::post('/view/store',[ListingController::class,'saveimg'])->name('image-store');

///////////
    ///  get all listings of this project /////
    Route::get('/fresh/list',[ListingController::class,'indexUnFresh'])->name('index.fresh');

    Route::get('/prossj',[SearchListController::class,'list'])->name('projects.lists');
    Route::get('/project/listing',[SearchListController::class,'list'])->name('listings.list');

    Route::get('/project/listings',[ListingController::class,'index'])->name('listings.list');

Route::get('/project/listings/{id}',[ProjectController::class,'listings'])->name('project-listings');
Route::put('/project/image/{id}',[ProjectController::class,'updateimage'])->name('project-update2');
    ///  get all listings of this user  ///
Route::get('/user/listings/{id}',[UserController::class,'listings']);
//////////

///  get all listings of this user
Route::get('/user/owners/{id}',[UserController::class,'owners']);
//////////

//// excel  import and export route ////


///owners import and export
Route::get('/owner-import',[OwnerController::class,'importView'])->name('import-view');
Route::post('/import-owners',[OwnerController::class,'import'])->name('import-owners');
Route::get('/export-owners',[OwnerController::class,'exportOwners'])->name('export-owners');

///contacts import and export
Route::get('/contact-import',[ContactController::class,'importView'])->name('import-view');
Route::post('/import-contacts',[ContactController::class,'import'])->name('import-contacts');
Route::get('/export-contacts',[ContactController::class,'exportContacts'])->name('export-contacts');

///leads import and export
Route::get('/contact-import',[LeadController::class,'importView'])->name('import-view');
Route::post('/import-leads',[LeadController::class,'import'])->name('import-leads');
Route::get('/export-leads',[LeadController::class,'exportLeads'])->name('export-leads');


///users import and export
Route::get('/user-import',[UserController::class,'importView'])->name('import-view');
Route::post('/import-users',[UserController::class,'import'])->name('import');
Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');
Auth::routes();


///projects import and export
Route::get('/projects-import',[ProjectController::class,'importView'])->name('import-view');
Route::post('/import-projects',[ProjectController::class,'import'])->name('import-projects');
Route::get('/export-projects',[ProjectController::class,'exportProjects'])->name('export-projects');
Auth::routes();

///users import and export
Route::get('/listings-import',[ListingController::class,'importView'])->name('import-view');
Route::post('/import-listings',[ListingController::class,'import'])->name('import-listings');
Route::get('/export-listings',[ListingController::class,'exportListings'])->name('export-listings');
Auth::routes();

///////////////////////////////
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});
