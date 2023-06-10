<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Section;
use Image;
use Session;
class categoryController extends Controller
{
    //
    public function categories()
    {
      Session::put('page','categories');
       
      $categories = DB::table('categories')
      ->join('sections', 'categories.section_id', '=', 'sections.id')
      ->select('categories.*', 'sections.name')->get()->toArray();
    //   echo "<pre>"; dd($categories['id']);die;
        //  dd($categories); die;
        // $vendorDetails=Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        // $vendorDetails=json_decode(json_encode($vendorDetails),true);
    //    return view('table', ['categories' => $categories]);
    
          return view('admin.categories.categories',[ 'categories'=>$categories]); 
    }
    // update Categories Status
    public function updateCategoryStatus(Request $request){
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
      Category::where('id', $data['category_id'])->update(['status' => $status]);
    
      return  response()->json(['status'=> $status,'category_id'=> $data['category_id']]);
    }
   }
  
//    delete Category
   public function deleteCategory($id)
{
    Category::where('id', $id)->delete();
    $message ="The Category has been deleted successfully";
    return redirect()->back()->with('success_message', $message);
}

// add and Update Category
   public function addUpdatecategory(Request $request,$id=null)
   {
    Session::put('page' , 'categories');

    if($id=="")
    {

        $title ="Add Category";
        $category = new Category;
        $getCategories=array();
        $message = "Section successfully added";

    }
    else{
        $title ="Edit the Section";
        $category =Category::find($id);
        $getCategories= Category::with('subCategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get()->toArray();
        // dd($getCategories); die;
        $message = "Category updated successfully";
    }
    $getAllSections =Section::get()->toArray();
    if($request->isMethod('post'))
    {
    Session::put('page' , 'categories');

        $data = $request->all();
        if($request->hasFile('category_image')){
            $image_temp =$request->file('category_image'); 
             if($image_temp->isValid())

             { $ext = $image_temp->getClientOriginalExtension(); 
                  $imageName =rand(111,999).'.'.$ext;
              $imagePath = 'admin/front/images/category_images/'.$imageName; 
                 Image::make($image_temp)->save($imagePath); }
         }
         else if(!empty($data['category_current_image'])){
             $imageName =$data['category_current_image']; }
        
         else  {  $imageName ="";   }

        // echo "<pre>"; print_r($data['section_id']); die;

        $category->category_name = $data['category_name'];
        $category->parent_id =  $data['parent_id'];
        $category->section_id =  $data['section_id'];
        $category->category_image = $imageName;
        $category->category_discount =  $data['category_discount'];
        $category->description =  $data['description'];
        $category->url =  $data['url'];
        $category->meta_title =  $data['meta_title'];
        $category->meta_description =  $data['meta_description'];
        $category->meta_keywords =  $data['meta_keywords'];
        $category->status = 1;
        $category->save();

        return redirect('admin/categories')->with('success_message', $message);
    }
    return view('admin.categories.add_edit_category')->with(compact('title','category','getAllSections','getCategories'));

   }

   public function appendCategoryLevel(Request $request)
   {
    if($request->ajax()){ 
     $data =$request->all();
    
    // dd($data); die;
    // dd ($data['section_id']);die;
     $getCategories= Category::with('subCategories')->where(['parent_id'=>0,'section_id'=>$data['section_id']])->get()->toArray();
    
    
    return view('admin.categories.append_categories_level')->with(compact('getCategories'));

}
   }
}
