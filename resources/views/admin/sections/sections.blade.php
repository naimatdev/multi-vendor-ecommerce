@extends('admin.layout.layout')
@section('contents')
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sections</h4>
            <h4 class="card-title"><a href="{{ url('admin/add-edit-section') }}" class="btn btn-primary" style="max-width: 150px";display ="inline-block; float:left">add section</a></h4>
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
                               Name
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section )
                        <tr>
                            <td>
                                {{ $section['id'] }}
                            </td>
                            <td>
                                {{ $section['name'] }}
                            </td>
                            <td>
                                @if($section['status']==1)
                                <a href="javascript:void(0)" class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id ="{{ $section['id'] }}">
                                <i class="mdi mdi-bookmark-check" style="font-size: 32px;" status ="active"></i></a>
                                @else 
                                <a href="javascript:void(0)" class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id ="{{ $section['id'] }}">
                                    <i class="mdi mdi-bookmark-outline" style="font-size: 32px;" status ="inactive"></i></a>
                                @endif
                            </td>
                         <td>
                            <a href="{{ url('admin/add-edit-section/'.$section['id']) }}">
                                <i class="mdi mdi-pencil-box" style="font-size: 32px;"></i> </a>
                               
                                <a module="section" moduleId="{{ $section['id'] }}" class="confirm-delete" href="javascript:void(0)">
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