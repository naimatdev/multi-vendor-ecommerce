@extends('admin.layout.layout')
@section('contents')

    <div class="main-panel ">
        <div sclass="content-wrapper">
            <div class="row">
            
            </div>
            <h3>{{ $title }}</h3>
       
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upadate sections Details</h4>
                        {{-- @if(Session::has('error_message'))
                        <div class="alert alert-danger">
                          <strong>Error!</strong>    
                            {{ Session::get('error_message') }}
                            </div>
                            @endif --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            {{-- second error --}}
                            @if(Session::has('success_message'))
                            <div class="alert alert-success">
                              <strong>Success!</strong>    
                                {{ Session::get('success_message') }}
                            </div>
              
                                @endif
                        <p class="card-description">
                        {{-- Basic form layout --}}
                        </p>
                        <form class="forms-sample" method="post" @if(empty($section['id'])) action="{{ url('admin/add-edit-section') }}" @else  action="{{ url('admin/add-edit-section/'.$section['id']) }} @endif" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="section_name">Section Name</label>
                                 <input type="text" name ="section_name" @if(!empty($section['name'])) value="{{ $section['name'] }}" placeholder="Enter the section name"  @else value="{{ old('section_name') }}" placeholder="Enter The Section Name Here" @endif class="form-control" id="section_name" >
                               
                            </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me     
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                    </div>   
                </div>
 
  </div>
</div>
  

  @endsection