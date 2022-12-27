@extends('layouts.admin')
@section('content')
@can('owner-create') 
<form action="{{ route('owners.store') }}" method="POST"> 
    @csrf
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CREATE OWNER </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                        
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" id="firstname"  name ="firstname" class="form-control round"
                                        placeholder="firstname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" id="lastname" name ="lastname" class="form-control square"
                                        placeholder="lastname">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Email</label>
                                    <input type="email" id="email" name ="email" class="form-control round"
                                        placeholder="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" id="nationality"  name ="nationality" class="form-control square"
                                        placeholder="nationality">
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-12">
                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">State</label>
                                    <input type="text" id="state" name ="state" class="form-control round"
                                        placeholder="state">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call">Call</label>
                                    <input type="text" id="call"  name ="call" class="form-control square"
                                        placeholder="call">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12">
                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Project</label>
                                    <select class="form-select" id="project_id" name="project_id">
                                                <option selected>Choose project ...</option>
                                            @foreach($data as $key => $project)
                                                <option value="{{ $project->id }}"> {{ $project->name ?? '' }}</option>
                                             @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="unitNo">Unit No</label>
                                    <input type="text" id="unitNo"  name ="unitNo" class="form-control square"
                                        placeholder="unitNo">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="source">Source</label>
                                    <select class="form-select" id="source" name="source">
                                            <option selected>Choose lead source ...</option>
                                            <option value="Company Website'">Company Website'</option>
                                            <option value="Whatsapp">Whatsapp</option>
                                            <option value="Personal Referral">Personal Referral</option>
                                            <option value="Bank Referral">Bank Referral</option>
                                            <option value="Client Referral">Client Referral</option>
                                            <option value="Open House">Open House</option>
                                            <option value="Direct Call">Direct Call</option>
                                            <option value="Walk-in">Walk-in</option>
                                            <option value="Exhibition Stand">Exhibition Stand</option>
                                            <option value="Existing Client">Existing Client</option>
                                            <option value="Email Campaign">Email Campaign</option>
                                            <option value="SMS Campaign">SMS Campaign</option>
                                            <option value="Word of Mouth">Word of Mouth</option>
                                            <option value="Cold Call">Cold Call</option>
                                            <option value="Google">Google</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Dubizzle">Dubizzle</option>
                                            <option value="Property Finder">Property Finder</option>
                                            <option value="Other Portal">Other Portal</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Linkedin">Linkedin</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Bayut.com">Bayut.com</option>
                                            <option value="Developer">Developer</option>                                            <option value="Email Campaign">Email Campaign</option>
                                            <option value="Other">Other</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Emirate Id Number</label>
                                    <input type="text" id="emirate_id_number"  name ="emirate_id_number" class="form-control square"
                                        placeholder="emirate_id_number Input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" id="mobile"  name ="mobile" class="form-control round"
                                        placeholder="mobile">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alternate mobile">Alternate Mobile</label>
                                    <input type="text" id="alternate_mobile"   name ="alternate_mobile" class="form-control square"
                                        placeholder="alternate  mobile Input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="assign_to">Assign To</label>
                           <!--         <input type="text" id="assign_to"   name ="user_id" class="form-control round"
                                        placeholder="assign_to Input"> -->

                                        <select class="form-select" id="user_id" name="user_id">
                                                <option selected>Choose owner ...</option>
                                            @foreach($users as $key => $user)
                                            {{$role=$user->getRoleNames()}}
                                            @if(! $role->isEmpty())
                                            @if( $role[0]== "Listing")
                                                <option value="{{ $user->id }}"> {{ $user->name ?? '' }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            
                        </div>

                        <input type="hidden" id="created_by"  name ="created_by" class="form-control square"   value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                  SAVE
                </button>
                                </div>
                            </div>
                           
                        </div>
                    </div>


     

                    
                </div>
            </div>
        </div>
    </section>




        </form>
    <!-- Input Style end -->
    
@endcan   
@endsection