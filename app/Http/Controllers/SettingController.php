<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{

    public function tenantPermissionSetting($tenantId, $roleId)
    {
        $tenant = DB::connection('mysql')->table('tenants')->where('id', $tenantId)->first();
        if (!$tenant) {
            return redirect()->back()->with('error', 'Tenant not found.');
        }
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database_name);
        DB::reconnect('tenant');
        $permissions = DB::connection('tenant')->table('permissions')->get();
        if (!$permissions) {
            return redirect()->back()->with('error', 'Permission not found.');
        }
        $role = Role::on('tenant')->find($roleId);
        if (!$role) {
            return redirect()->back()->with('error', 'Role  not found.');
        }
        return view('backend.setting.tenant_permission', compact('tenant', 'role', 'permissions'));
    }

    public function updatePermissions(Request $request, $tenantId, $roleId)
    {
        $tenant = DB::connection('mysql')->table('tenants')->where('id', $tenantId)->first();
        if (!$tenant) {
            return redirect()->back()->with('error', 'Tenant not found.');
        }

        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database_name);
        DB::reconnect('tenant');

        $role = Role::on('tenant')->find($roleId);

        if (!$role) {
            return redirect()->back()->with('error', 'Role not found in tenant database.');
        }
        $permissionNames = $request->input('permissions', []);
        $permissions = Permission::on('tenant')->whereIn('name', $permissionNames)->get();
        if ($permissions->isEmpty()) {
            return redirect()->back()->with('error', 'No valid permissions found.');
        }
        $role->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
}
