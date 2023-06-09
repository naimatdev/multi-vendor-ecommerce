@extends('admin.layout.layout')
@section('contents')

    <div class="main-panel ">
    
        <div sclass="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 pl-5">
                            <h3 class="font-weight-bold">Settings</h3>
                            <h6 class="font-weight-normal mb-0">Upadate Admin Details <span class="text-primary">3 unread alerts!</span></h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upadate Admin Details</h4>
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
                        <form class="forms-sample" method="post" action="{{ url('admin/update-admin-detail') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text"name ="admin_name"  value="{{  Auth::guard('admin')->user()->name }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                               
                            </div>
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">Admin mobail</label>
                                <input type="text"name ="phone"  value="{{  Auth::guard('admin')->user()->mobile }}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Admin Username/Email</label>
                                <input type="email"name ="email" class="form-control"  value="{{ Auth::guard('admin')->user()->email }}" >
                            </div>
                            {{-- udate here --}}
                             
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo</label>
                                <input type="file"name ="admin_image"   class="form-control" id="exampleInputEmail1" placeholder="image">
                                <input type="hidden" name="admin_current_image" id="" value="{{ Auth::guard('admin')->user()->image }}">
                             @if(!empty(Auth::guard('admin')->user()->image))
                                 <a href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}" target="_blank" rel="noopener noreferrer">view</a>
                           @endif
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