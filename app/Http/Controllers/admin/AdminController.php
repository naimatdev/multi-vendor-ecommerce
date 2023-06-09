<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use App\Models\Country;
use Auth;
use Hash;
use Image;
use Session;
class AdminController extends Controller
{
    //
    public function dashboard()
    {
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    public function updateAdminPassword(Request $request)
    {
      Session::put('page','update_admin_password');

        if($request->isMethod('post')){
            $data =$request->all();
        
            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
            {
                    //  if new password matching or not 
                    if($data['new_password']==$data['confirm_password'])
                    {
                      Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                      return redirect()->back()->with('success_message','Password updated');
                      
                    }
            }
            else
            {
                return redirect()->back()->with('error_message','Your Current Password Is Incorrect');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        
        return view('admin.setting.update_admin_password')->with(compact('adminDetails'));
    }
     
    // udate admin details route 
    public function updateAdminDetail(Request $request)
    { 
        Session::put('page','update_admin_details');
         if($request->isMethod('post')){
            // $data = $request->all();
            // echo "<br>";
            // print_r($data);
            // die;
          $rules = [
                'admin_name' => 'required|string|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/|max:255|',
                // 'email' => 'required',
                'phone' => 'required|numeric',
            ];
            $cumstomValidate =[
                'admin_name.required' => 'Admin name is required',
                'admin_name.regex' => 'Valid Name required',
                'phone.required' => 'Phone Number is required',
                'phone.numeric' => 'Phone Number must be numeric',

            ];
            $this->validate($request,$rules,$cumstomValidate);
            if($request->hasFile('admin_image')){
               $image_temp =$request->file('admin_image'); 
                if($image_temp->isValid())

                { $ext = $image_temp->getClientOriginalExtension(); 
                     $imageName =rand(111,999).'.'.$ext;
                 $imagePath = 'admin/images/photos/'.$imageName; 
                    Image::make($image_temp)->save($imagePath); }
                
            }
            else if(!empty($data['admin_current_image'])){
                $imageName =$data['admin_current_image']; }
           
            else  {  $imageName ="";   }

                $data = $request->all();
                Admin::Where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['phone'],'image'=>$imageName]);
                return  redirect()->back()->with('success_message', 'Admin Detail Successfully Udated');
    }
   
    return view('admin.setting.update_admin_details');
    

}
public function updateVendorDetail($slug,Request $request)
{
if($slug=="personal"){
    Session::put('page','vendor_personal_details');

    if($request->isMethod('post'))
    {
       
       $data= $request->all();
    //    echo "<pre>";
    //    print_r($data); die;
    $rules = [
        'admin_name' => 'required|string|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/|max:255|',
        // 'email' => 'required',
        'vendor_mobile' => 'required|numeric',
    ];
    $cumstomValidate =[
        'admin_name.required' => 'Admin name is required',
        'admin_name.regex' => 'Valid Name required',
        'vendor_mobile.required' => 'mobile Number is required',
        // 'mobile.numeric' => 'mobile Number must be numeric',

    ];
    $this->validate($request,$rules,$cumstomValidate);
    if($request->hasFile('admin_image')){
       $image_temp =$request->file('admin_image'); 
        if($image_temp->isValid())
        { $ext = $image_temp->getClientOriginalExtension(); 
             $imageName =rand(111,999).'.'.$ext;
         $imagePath = 'admin/images/photos/'.$imageName; 
            Image::make($image_temp)->save($imagePath); }
        
    }
    else if(!empty($data['vendor_current_image'])){
        $imageName =$data['vendor_current_image']; }
   
    else  {  $imageName ="";   }
      // Update In  Admins
        $data = $request->all();

        Admin::Where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imageName]);
    //    udate in vendors Table
    Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['admin_name'],'mobile'=>$data['vendor_mobile'],
    'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode']]);
        return  redirect()->back()->with('success_message', 'Vendors Detail Successfully Udated');
   
    }
    $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
}
else if($slug=="business")
{
    Session::put('page','vendor_business_details');


    if($request->isMethod('post')){

       $data= $request->all();

       $rules = [
        'shop_name' => 'required',
        // 'email' => 'required',
        'shop_mobile' => 'required|numeric',
    ];
    $cumstomValidate =[
        'admin_name.required' => 'Admin name is required',
        // 'admin_name.regex' => 'Valid Name required',
        'vendor_mobile.required' => 'mobile Number is required',
        // 'mobile.numeric' => 'mobile Number must be numeric',

    ];

    $this->validate($request,$rules,$cumstomValidate);

    if($request->hasFile('address_proof_image')){
       $image_temp =$request->file('address_proof_image'); 
        if($image_temp->isValid())

        { $ext = $image_temp->getClientOriginalExtension(); 
             $imageName =rand(111,999).'.'.$ext;
         $imagePath = 'admin/images/proofs/'.$imageName; 
            Image::make($image_temp)->save($imagePath); }
        
    }
    else if(!empty($data['address_proof_image_current'])){
        $imageName =$data['address_proof_image_current']; }
   
    else  {  $imageName ="";   }
      // Update In  Admins
        // $data = $request->all();

        // Admin::Where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imageName]);
    //    udate in vendors Table
    VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],
    'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_mobile'=>$data['shop_mobile'],'shop_website'=>$data['shop_website'],'shop_email'=>$data['shop_email'],'address_proof'=>$data['address_proof']
    ,'address_proof_image'=>$imageName,'business_license_number'=>$data['business_license_number'],'gst_number'=>$data['gst_number'],'pan_number'=>$data['pan_number']]);

    
    return  redirect()->back()->with('success_message', 'Business Detail Successfully Udated');
}
$vendorDetails = VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
      
   
    
}
else if($slug =="bank")
{
    Session::put('page','vendor_bank_details');

    if($request->isMethod('post'))
    {
        $data= $request->all();

        $rules = [
         'account_holder_name' => 'required',
         // 'email' => 'required',
         'bank_name' => 'required',
     ];
     $cumstomValidate =[
         'admin_name.account_holder_name' => 'acount holder name is required',
         // 'admin_name.regex' => 'Valid Name required',
         'bank_name.required' => 'bank name  is required',
         // 'mobile.numeric' => 'mobile Number must be numeric',
 
     ];
     $this->validate($request,$rules,$cumstomValidate);

     VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['account_holder_name'=>$data['account_holder_name'],'bank_name'=>$data['bank_name'],
     'bank_number'=>$data['bank_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);
     
     return  redirect()->back()->with('success_message', 'Bank Detail Successfully Udated');
    }
 
    $vendorDetails = VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
}
$countries = Country::where('status', 1)->get();
return view('admin.setting.update_vendor_details')->with(compact('slug', 'vendorDetails','countries'));
}
 
    public function checkAdminPassword(Request $req)
    {
    $data =$req->all();
    if(Hash::check($data['current_password'],Auth::guard('admin')->User()->password))
    {
        return "true";
    }   
    else
    {
        return "false";
    }
    }
    // login function
  public function login(Request $request)
{
    if($request->isMethod('post')){
        $request-> validate([
            'email' => 'required|email|max:258',
            'password' => 'required',
        ]);
        $data = $request->all();
        // echo "<pre>"; print_r($data); 
        // die();
        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status' => 1]))
        {
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back()->with('error_msg', 'Invalid Credentials');
        }
    }
    return view('admin.login');
}
public function Test()
{

    return view('admin.admins.admins');
}

 public function Admins($type=null)
 {
$admins =Admin::query();
// $admins =$admins->get()->toArray();
// dd($admins); die;
if(!empty($type)){
    $admins =$admins->where('type',$type);
    $titles = ucfirst($type)."s";
    Session::put('page', 'view'.strtolower($titles));
}
else{
    $titles ="All Admins/Subadmins/Vendors";
    Session::put('page', 'viewAll');

}
   $admins =$admins->get()->toArray();

   return view('admin.admins.admins')->with(compact('admins','titles'));
 }
 public function viewVendorDetails($id)
 {
    $vendorDetails=Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
    $vendorDetails=json_decode(json_encode($vendorDetails),true);
// dd($vendorDetails);
    return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
 }
 public function apdateAdminStatus(Request $request){
     //  echo "<pre>"; dd($data['status']); die;
     if($request->ajax()){
         
         $data= $request->all();
if($data['status']=="active"){
    $status = 1;
//   Admin::where('id', $data['admin_id'])->update(['status' => $status]);
   
}
else    
{
    $status = 0;
//   Admin::where('id', $data['admin_id'])->update(['status' => $status]);

    // dd($status);die;
}
// print_r( $status); die;
   Admin::where('id', $data['admin_id'])->update(['status' => $status]);
 
   return  response()->json(['status'=> $status,'admin_id'=> $data['admin_id']]);
 }
}

public function logout()
{
    Auth::guard('admin')->logout();
    return redirect('admin/login');
}
}
