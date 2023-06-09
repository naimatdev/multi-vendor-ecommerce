@extends('admin.layout.layout')
@section('contents')
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$titles }}</h4>
            {{-- <p class="card-description">
                Add class <code>.table-dark</code>
            </p> --}}
            <div class="table-responsive pt-3">
                <table class="table " >
                    <thead>
                        <tr>
                            <th>
                                Admin ID
                            </th>
                            <th>
                               Name
                            </th>
                            <th>
                               Type
                            </th>
                            <th>
                                Mobile
                            </th>   <th>
                                Email
                            </th>
                            <th>Image
                               
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
                        @foreach ($admins as $admin )
                            
                        <tr>
                            <td>
                                {{ $admin['id'] }}
                            </td>
                            <td>
                                {{ $admin['name'] }}

                            </td>
                            <td>
                                {{ $admin['type'] }}

                            </td>
                            <td>
                                {{ $admin['mobile'] }}

                            </td>   
                              <td>
                                {{ $admin['email'] }}

                            </td>
                            <td>
                                <img src="{{ asset('admin/images/photos/'.$admin['image']) }}" alt="">

                            </td>
                            <td>
                                @if($admin['status']==1)
                                <a href="javascript:void(0)" class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id ="{{ $admin['id'] }}">
                                <i class="mdi mdi-bookmark-check" style="font-size: 32px;" status ="active"></i></a>
                                @else
                                
                                <a href="javascript:void(0)" class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id ="{{ $admin['id'] }}">
                                    <i class="mdi mdi-bookmark-outline" style="font-size: 32px;" status ="inactive"></i></a>
                                @endif
                            </td>
                         <td>
                            @if($admin['type']=="vendor")
                            <a href="{{ url('admin/view-vendor-details/'.$admin['id']) }}">
                            <i class="mdi mdi-file-document" style="font-size: 32px;"></i></td>   
                        </a>
                            @endif
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