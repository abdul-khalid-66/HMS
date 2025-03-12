<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $studentCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->count();

        $teacherCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->count();
        $user = User::get();

        $totalFeesCollected = Fee::sum('paid_fees');
        $totalFeesDue       = Fee::sum('total_fees');

        // Calculate fees progress percentage
        $feesProgress = ($totalFeesDue > 0) ? ($totalFeesCollected / $totalFeesDue) * 100 : 0;



        $totalSalariesBudget    = Salary::sum('amount');
        $totalSalariesPaid      = Salary::where('paid', 1)->sum('amount');
        $salariesProgress       = ($totalSalariesBudget > 0) ? ($totalSalariesPaid / $totalSalariesBudget) * 100 : 0;


        $studentCount;
        $teacherCount;
        $user;
        return view('backend.admin.dashboard', compact('user', 'studentCount', 'teacherCount', 'totalFeesCollected', 'feesProgress', 'totalSalariesPaid', 'salariesProgress'));
    }
}
