@extends('backend.layout.master')

@section('content')
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="{{ route('tenant.update-permissions', ['tenantId' => $tenant->id, 'roleId' => $role->id]) }}" method="POST">
                <div class="product-status-wrap">

                        <h1>Manage Permissions for {{ $role->name }} in {{ $tenant->name }}</h1>
                        <div class="add-product">
                            <button type="submit" class="btn btn-primary">Update Permissions</button>
                            {{-- <a href="#">Add Library</a> --}}
                        </div>
                        <div class="asset-inner">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Check box</th>
                                        <th>Permission</th>
                                    </tr>
                                        @csrf
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                        @if($role->permissions->contains('name', $permission->name)) checked @endif>

                                                </td>
                                                <td>{{ $permission->name }}</td>
                                            </tr>
                                        @endforeach
                                        
                                        
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection