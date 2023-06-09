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
                        <h4 class="card-title">{{ $title }}</h4>
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
                        <form class="forms-sample" method="post" @if(empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else  action="{{ url('admin/add-edit-category/'.$category['id']) }} @endif" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">category Name</label>
                                 <input type="text" name ="category_name" @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" placeholder="Enter the category name"  @else value="{{ old('category_name') }}" placeholder="Enter The category Name Here" @endif class="form-control" id="category_name" >
                               
                            </div>
                            <div class="form-group">
                                <label for="section_id">select Section</label>
                                <select name ="section_id" class="form-control" id="section_id">
                                    <option value="">Select</option>
                                    @foreach ($getAllSections as $section)
                             <option   value="{{ $section['id'] }}"@if($section['id']==$category['section_id']) selected @endif>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- main category append here --}}
                            <div id="appendCategoryLevel">
                            @include('admin.categories.append_categories_level')
                        </div>
                            <div class="form-group">
                                <label for="category_name">category image</label>
                                 <input type="file" name ="category_image" @if(!empty($category['category_image'])) value="{{ $category['category_image'] }}" placeholder="Enter the category name"  @else value="{{ old('category_image') }}" placeholder="Enter The category Name Here" @endif class="form-control" id="category_image" >
                                 <input type="hidden" name="category_current_image" id="" value="{{ $category['category_image'] }}">
                                 @if(!empty($category['category_image']))
                                     <a href="{{ url('admin/front/images/category_images/'.$category['category_image']) }}" target="_blank" rel="noopener noreferrer">view</a>
                               @endif
                                </div>
                            <div class="form-group">
                                <label for="category_name">category discount</label>
                                 <input type="text" name ="category_discount" @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}"  @else value="{{ old('category_discount') }}" placeholder="Enter The category discount Here" @endif class="form-control" id="category_discount" >
                            </div>
                            <div class="form-group">
                                <label for="category_name">description</label>
                                 <input type="text" name ="description" @if(!empty($category['description'])) value="{{ $category['description'] }}"   @else value="{{ old('description') }}" placeholder="Enter The category description Here" @endif class="form-control" id="description" >
                               
                            </div>
                              <div class="form-group">
                                <label for="category_name"> category url</label>
                                 <input type="text" name ="url" @if(!empty($category['url'])) value="{{ $category['url'] }}" placeholder="Enter the category url"  @else value="{{ old('url') }}" placeholder="Enter The category url Here" @endif class="form-control" id="url" >
                               
                            </div>
                            <div class="form-group">
                                <label for="category_name"> meta_title</label>
                                 <input type="text" name ="meta_title" @if(!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" placeholder="Enter the category meta_title"  @else value="{{ old('meta_title') }}" placeholder="Enter The category meta_title Here" @endif class="form-control" id="meta_title" >
                               
                            </div>
                            <div class="form-group">
                                <label for="category_name"> meta_description</label>
                                 <input type="text"  name ="meta_description" @if(!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" placeholder="Enter the category meta_description"  @else value="{{ old('meta_description') }}" placeholder="Enter The category meta_description Here" @endif class="form-control" id="meta_description" >
                               
                            </div>
                            <div class="form-group">
                                <label for="category_name"> meta_keywords</label>
                                 <input type="text"  name ="meta_keywords" @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" placeholder="Enter the category meta_keywords"  @else value="{{ old('meta_keywords') }}" placeholder="Enter The category meta_keywords Here" @endif class="form-control" id="meta_keywords" >
                               
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