<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {

        $teacherCount = User::on('tenant')->whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->count();

        $studentCount = User::on('tenant')->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->count();

        $totalFeesCollected = Fee::on('tenant')->sum('paid_fees');
        $totalFeesDue       = Fee::on('tenant')->sum('total_fees');
        $feesProgress = ($totalFeesDue > 0) ? ($totalFeesCollected / $totalFeesDue) * 100 : 0;

        $totalSalariesBudget    = Salary::on('tenant')->sum('amount');
        $totalSalariesPaid      = Salary::on('tenant')->where('paid', 1)->sum('amount');
        $salariesProgress       = ($totalSalariesBudget > 0) ? ($totalSalariesPaid / $totalSalariesBudget) * 100 : 0;

        $user = User::on('tenant')->get();


        $studentCount;
        $teacherCount;
        $user;
        return view('backend.admin.dashboard', compact('user', 'studentCount', 'teacherCount', 'totalFeesCollected', 'feesProgress', 'totalSalariesPaid', 'salariesProgress'));
    }


    public function updatePermissions(Request $request, $roleId)
    {
        $role = Role::findById($roleId);
        $permissions = $request->input('permissions', []);

        // Sync permissions for the role
        $role->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
}
