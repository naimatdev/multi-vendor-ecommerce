@extends('admin.layout.layout')
@section('contents')
<style>
    .card{
        box-shadow: 5px 10px 8px #888888;
    }
    input
    {
        box-shadow: 1px 1px 1px #000000 !important;

    }
</style>
    <div class="main-panel mt-5 bg">
        <div class="content-wrapper">
            <h3><a href="{{ url('admin/admins') }}" class="btn btn-primary "><span class="mdi mdi-arrow-left-bold-circle ">Back</span></a></h3>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h3 class="ml-6 p-3">vendor personal details </h3>

         
                           
                       
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendor Username/Email</label>
                                <input type="text"name ="admin_name"  value="{{  $vendorDetails['vendor_personal']['name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendor mobail</label>
                                <input type="email"name ="vendor_mobile"  value="{{  $vendorDetails['vendor_personal']['email'] }}" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Vendor address</label>
                                <input type="text"name ="email" class="form-control"  value="{{ $vendorDetails['vendor_personal']['address']}}" >
                            </div>

                           
                            <div class="form-group">
                                <label for="vendor_city">city</label>
                                <input type="text"name ="vendor_city" id="vendor_city" class="form-control"  value="{{ $vendorDetails['vendor_personal']['city']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">state</label>
                                <input type="text"name ="vendor_state" id="vendor_state" class="form-control"  value="{{ $vendorDetails['vendor_personal']['state']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">country</label>
                                <input type="text"name ="vendor_country" id="vendor_country" class="form-control"  value="{{ $vendorDetails['vendor_personal']['country']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_pincode">pincode</label>
                                <input type="text"name ="vendor_pincode" id="vendor_pincode" class="form-control"  value="{{$vendorDetails['vendor_personal']['pincode']}}" >
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo</label>
                              <img src="{{url('admin/images/photos/'.$vendorDetails['image'])}}" alt="" style="width: 200px"> 
                                </div>
                            </div>
                        </div>   
                 
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h3 class="ml-5 p-3">vendor Business details </h3>
                       
                            <div class="form-group">
                                <label for="exampleInputEmail1">shop name</label>
                                <input type="text"name ="admin_name"  value="{{  $vendorDetails['vendor_business']['shop_name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">shop address</label>
                                <input type="email"name ="vendor_mobile"  value="{{  $vendorDetails['vendor_business']['shop_address'] }}" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">shop city</label>
                                <input type="text"name ="email" class="form-control"  value="{{ $vendorDetails['vendor_business']['shop_city']}}" >
                            </div>

                           
                            <div class="form-group">
                                <label for="vendor_city">shop state</label>
                                <input type="text"name ="vendor_city" id="vendor_city" class="form-control"  value="{{ $vendorDetails['vendor_business']['shop_state']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">shop country</label>
                                <input type="text"name ="vendor_state" id="vendor_state" class="form-control"  value="{{ $vendorDetails['vendor_business']['shop_country']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">shop pincode</label>
                                <input type="text"name ="vendor_country" id="vendor_country" class="form-control"  value="{{ $vendorDetails['vendor_business']['shop_pincode']}}" >
                            </div>
                            <div class="form-group">
                                <label for="vendor_pincode">shop contact</label>
                                <input type="text"name ="vendor_pincode" id="vendor_pincode" class="form-control"  value="{{$vendorDetails['vendor_business']['shop_mobile']}}" >
                            </div>  <div class="form-group">
                                <label for="shop_website"></label>
                                <input type="text"name ="vendor_pincode" id="vendor_pincode" class="form-control"  value="{{$vendorDetails['vendor_business']['shop_website']}}" >
                            </div>
                        </div>  <div class="form-group">
                            <label for="address proof"></label>
                            <input type="text"name ="vendor_pincode" id="vendor_pincode" class="form-control"  value="{{$vendorDetails['vendor_business']['address_proof']}}" >
                        </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">adress proof image</label>
                              <img src="{{url('admin/images/photos/'.$vendorDetails['vendor_business']['address_proof_image'])}}" alt="" style="width: 200px"> 
                                </div>
                            </div>
                        </div>   
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h3 class="ml-5 p-3">vendor Bank details </h3>
                       
                            <div class="form-group">
                                <label for="exampleInputEmail1">account_holder_name</label>
                                <input type="text"name ="admin_name"  value="{{  $vendorDetails['vendor_bank']['account_holder_name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Admin Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">bank_name</label>
                                <input type="email"name ="vendor_mobile"  value="{{  $vendorDetails['vendor_bank']['bank_name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">bank_number</label>
                                <input type="text"name ="email" class="form-control"  value="{{ $vendorDetails['vendor_bank']['bank_number']}}" >
                            </div>

                           
                            <div class="form-group">
                                <label for="vendor_city">bank_ifsc_code</label>
                                <input type="text"name ="vendor_city" id="vendor_city" class="form-control"  value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code']}}" >
                            </div>
                        
                          
                            </div>
                        </div>   
                </div>
        </div>
    </div>
    </div>
  @endsection