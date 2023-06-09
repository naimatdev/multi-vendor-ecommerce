@extends('admin.layout.layout')
@section('contents')
{{-- <style>.bg>*{
    background-color: #bebeea;
}
input{
    box-shadow: 1px 2px 5px 5px #888;
}</style> --}}
    <div class="main-panel mt-5 bg">
        <div class="content-wrapper">
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
            {{-- personal slug start here --}}
            @if($slug=="personal")
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upadate personal information</h4>
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
                        <form class="forms-sample" method="post" action="{{ url('admin/update-vendor-details/personal') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendor Username/Email</label>
                                <input type="text"name ="admin_name"  value="{{  Auth::guard('admin')->user()->name }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendor mobail</label>
                                <input type="text"name ="vendor_mobile"  value="{{  Auth::guard('admin')->user()->mobile }}" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Admin Username/Email</label>
                                <input type="email"name ="email" class="form-control"  value="{{ $vendorDetails['email']}}" >
                            </div>

                            <div class="form-group">
                                <label for="vendor_address">address</label>
                                <input type="text"name ="vendor_address" id="vendor_address" class="form-control"  value="{{ $vendorDetails['address']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_city">city</label>
                                <input type="text"name ="vendor_city" id="vendor_city" class="form-control"  value="{{ $vendorDetails['city']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">state</label>
                                <input type="text"name ="vendor_state" id="vendor_state" class="form-control"  value="{{ $vendorDetails['state']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">country</label>
                                {{-- <input type="text"name ="vendor_country" id="vendor_country" class="form-control"  value="{{ $vendorDetails['country']}}" > --}}
                            <select name="vendor_country" id="vendor_country" class="form-control" style="color:#495057 !important;">
                                <option value="">selete country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country['country_name'] }}"@if($country['country_name']==$vendorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                                    
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="vendor_pincode">pincode</label>
                                <input type="text"name ="vendor_pincode" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['pincode']}}" >
                            </div>
                            {{-- <div class="form-group">
                                <label for="vendor_country">address</label>
                                <input type="email"name ="vendor_country" id="vendor_country" class="form-control"  value="{{ Auth::guard('admin')->user()->email }}" >
                            </div> --}}
                            {{-- udate here --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo</label>
                                <input type="file"name ="admin_image"   class="form-control" id="exampleInputEmail1" placeholder="image">
                                <input type="hidden" name="vendor_current_image" id="" value="{{ Auth::guard('admin')->user()->image }}">
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
            {{-- bussiness slug form here started     ----------------------    ----- --}}
  @elseif ($slug=="business")
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Upadate Business information</h4>
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
            <form class="forms-sample" method="post" action="{{ url('admin/update-vendor-details/business') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Business Username/Email</label>
                    <input type="text"name ="shop_owner_email"  readonly value="{{  Auth::guard('admin')->user()->name }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">shop name</label>
                    <input type="text"name ="shop_name"  value="{{ $vendorDetails['shop_name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
                  
                </div>
               
                <div class="form-group">
                    <label for="vendor_address">shop address</label>
                    <input type="text"name ="shop_address" id="vendor_address" class="form-control"  value="{{ $vendorDetails['shop_address']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_city">shop city</label>
                    <input type="text"name ="shop_city" id="vendor_city" class="form-control"  value="{{ $vendorDetails['shop_city']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_state">shop state</label>
                    <input type="text"name ="shop_state" id="vendor_state" class="form-control"  value="{{ $vendorDetails['shop_state']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_country">shop country</label>
                    {{-- <input type="text"name ="shop_country" id="vendor_country" class="form-control"  value="{{ $vendorDetails['shop_country']}}" > --}}
                  
                    <select name="shop_country" id="shop_country" class="form-control" style="color:#495057 !important;">
                        <option value="">selete shop country</option>
                        @foreach ($countries as $country)
                        
                        <option value="{{ $country['country_name'] }}"@if($country['country_name']==$vendorDetails['shop_country']) selected @endif>{{ $country['country_name'] }}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">shop pincode</label>
                    <input type="text"name ="shop_pincode" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['shop_pincode']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">shop mobile</label>
                    <input type="text"name ="shop_mobile" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['shop_mobile']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">shop website</label>
                    <input type="text"name ="shop_website" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['shop_website']}}" >
                </div>
                 <div class="form-group">
                    <label for="vendor_pincode">shop email</label>
                    <input type="text"name ="shop_email" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['shop_email']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">shop address proof</label>
                    <select name="address_proof"  class="form-control"  > 
                        <option value="passport"@if($vendorDetails['address_proof']=='passport')selected @endif>passport</option>
                        <option value="voting card"@if($vendorDetails['address_proof']=='voting card')selected @endif>voting card</option>
                        <option value="PAN"@if($vendorDetails['address_proof']=='PAN')selected @endif>PAN</option>
                        <option value="driving license"@if($vendorDetails['address_proof']=='driving License')selected @endif>driving License</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">address_proof_image</label>
                    <input type="file"name ="address_proof_image"   class="form-control" id="exampleInputEmail1" placeholder="image">
                    <input type="hidden" name="address_proof_image_current" id="" value="{{ $vendorDetails['address_proof_image'] }}">
                 @if(!empty($vendorDetails['address_proof_image']))
                     <a href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}" target="_blank" rel="noopener noreferrer">view</a>
               @endif
                    </div>
                <div class="form-group">
                    <label for="vendor_pincode">business_license_number</label>
                    <input type="text"name ="business_license_number" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['business_license_number']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">gst_number</label>
                    <input type="text"name ="gst_number" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['gst_number']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">pan_number</label>
                    <input type="text"name ="pan_number" id="vendor_pincode" class="form-control"  value="{{ $vendorDetails['pan_number']}}" >
                </div>
                {{-- <div class="form-group">
                    <label for="vendor_country">address</label>
                    <input type="email"name ="vendor_country" id="vendor_country" class="form-control"  value="{{ Auth::guard('admin')->user()->email }}" >
                </div> --}}
                {{-- udate here --}}
               
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
  @elseif ($slug =="bank")
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Upadate Bank information</h4>
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
            <form class="forms-sample" method="post" action="{{ url('admin/update-vendor-details/bank') }}"  enctype="multipart/form-data">
                @csrf       <div class="form-group">
                    <label for="exampleInputEmail1">Email/username</label>
                    <input type="text"name ="vendor_name"  readonly value="{{  Auth::guard('admin')->user()->name }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Acount Holder name</label>
                    <input type="text"name ="account_holder_name"   value="{{ $vendorDetails['account_holder_name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">bank_name</label>
                    <input type="text"name ="bank_name"  value="{{ $vendorDetails['bank_name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
                  
                </div>
               
                <div class="form-group">
                    <label for="vendor_address">bank_number</label>
                    <input type="text"name ="bank_number" id="vendor_address" class="form-control"  value="{{ $vendorDetails['bank_number']}}" >
                </div>
                <div class="form-group">
                    <label for="vendor_city">bank_ifsc_code</label>
                    <input type="text"name ="bank_ifsc_code" id="vendor_city" class="form-control"  value="{{ $vendorDetails['bank_ifsc_code']}}" >
                </div>
              
             
                {{-- <div class="form-group">
                    <label for="vendor_country">address</label>
                    <input type="email"name ="vendor_country" id="vendor_country" class="form-control"  value="{{ Auth::guard('admin')->user()->email }}" >
                </div> --}}
                {{-- udate here --}}
               
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
  @endif
</div>
  @endsection