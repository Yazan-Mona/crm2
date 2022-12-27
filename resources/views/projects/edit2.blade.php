@extends('layouts.admin')
@section('content')
@can('project-edit') 
<form action="{{ route('project-update2' , $project->id ) }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('PUT')
    {{ csrf_field() }}

    <!-- Input Style start -->

                     <div class="form-group">
                     <label for="Image">main Image</label>
                     <input type="file" id="test"   name ="test" class="form-control square"
                        placeholder="user_id Input">
                    </div>
                    <div class="form-group">
        <label for="image">Image</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Image</label>
        </div>
    </div>
  
                                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
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