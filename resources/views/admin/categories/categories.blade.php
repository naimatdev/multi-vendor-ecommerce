@extends('admin.layout.layout')
@section('contents')
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Categories</h4>
            <h4 class="card-title"><a href="{{ url('admin/add-edit-category') }}" class="btn btn-primary" style="max-width: 150px; display :inline-block; float:left">add Category</a></h4>
            @if(Session::has('success_message'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ Session::get('success_message') }}
              </div>
              @endif
            {{-- <p class="card-description">
                Add class <code>.table-dark</code>
            </p> --}}
            <div class="table-responsive pt-3">
                <table class="table" id="sections">
                    <thead>
                        <tr>
                            <th>
                                Section ID
                            </th>
                            <th>
                               Category
                            </th>
                            <th>
                                section
                            </th>
                            <th>Parent Category</th>
                            <th>Url</th>

                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td>
                            2
                          
                            </td>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td>  
                                {{ $category->name }}

                            </td>
                            <td>{{  $category->category_name  }}</td>
                            <td>{{ $category->url }}</td>

                            <td>
                                @if($category->status==1)
                                <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{ $category->id }}" category_id ="{{ $category->id }}">
                                <i class="mdi mdi-bookmark-check" style="font-size: 32px;" status ="active"></i></a>
                                @else 
                                <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{ $category->id }}" category_id ="{{ $category->id }}">
                                    <i class="mdi mdi-bookmark-outline" style="font-size: 32px;" status ="inactive"></i></a>
                                @endif
                            </td>
                         <td>
                            <a href="{{ url('admin/add-edit-category/'.$category->id) }}">
                                <i class="mdi mdi-pencil-box" style="font-size: 32px;"></i> </a>
                               
                                <a module="category" moduleId="{{ $category->id }}" class="confirm-delete" href="javascript:void(0)">
                                    <i class="mdi mdi-file-excel" style="font-size: 32px;"></i> </a>
                                    </a>
                            </td>   
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
</div>


@endsection