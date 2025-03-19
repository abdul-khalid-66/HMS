@extends('backend.layout.master')

@section('content')
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>List Of All Schools</h4>
                    <div class="add-product">
                        {{-- <a href="#">Add Library</a> --}}
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody><tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Roles Permissions</th>
                                <th>Domain</th>
                                <th>Database</th>
                                <th>Users</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->id??"" }}</td>
                                    <td><img src="{{ asset('backend/img/product/book-1.jpg') }}" alt=""></td>
                                    <td>{{ $tenant->name??"" }}</td>
                                    <td>
                                        <a href="{{ route('tenant.permissions', ['tenantId' => $tenant->id, 'roleId' => 2]) }}" class="pd-setting">Admin</a>
                                        <a href="{{ route('tenant.permissions', ['tenantId' => $tenant->id, 'roleId' => 3]) }}" class="pd-setting">Teacher</a>
                                        <a href="{{ route('tenant.permissions', ['tenantId' => $tenant->id, 'roleId' => 4]) }}" class="pd-setting">Student</a>
                                    </td>
                                    <td>{{ $tenant->domain??"" }}</td>
                                    <td>{{ $tenant->database_name??"" }}</td>
                                    <td>{{ $tenant->user_count??"" }}</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="custom-pagination">
                        {{ $tenants->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection