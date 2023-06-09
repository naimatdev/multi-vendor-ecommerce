<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;
class sectionController extends Controller
{
    //
    public function Sections()
    {
      Session::put('page','sections');

        $sections = Section::get()->toArray();
    
        return view('admin.sections.sections')->with(compact('sections')); 
    }
    public function updateSectionStatus(Request $request){
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
      Section::where('id', $data['section_id'])->update(['status' => $status]);
    
      return  response()->json(['status'=> $status,'section_id'=> $data['section_id']]);
    }
   }
public function deleteSection($id)
{
    Section::where('id', $id)->delete();
    $message ="The section has been deleted successfully";
    return redirect()->back()->with('success_message', $message);
}
public function addUpdateSection(Request $request,$id =null)
{
    Session::put('page' , 'sections');

    if($id=="")
    {
        $title ="Add section";
        $section = new Section;
        $message = "Section successfully added";

    }
    else{
        $title ="Edit the Section";
        $section =Section::find($id);
        $message = "Section updated successfully";
    }
    if($request->isMethod('post'))
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $section->name = $data['section_name'];
        $section->status = 1;
        $section->save();

        return redirect('admin/sections')->with('success_message', $message);
    }
    return view('admin.sections.add_edit_section')->with(compact('title','section'));
    
}
}
