<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    public function view()
    {
        if (Auth::user() && auth()->user()->hasRole('super-admin|admin')) {
            return view('backend.admin.all_teachers');
        } elseif (Auth::user() && auth()->user()->hasRole('teacher')) {
            return view('backend.admin.all_teachers');
        } else {
            return redirect()->route('login');
        }
    }
    public function create()
    {
        if (Auth::user() && auth()->user()->hasRole('super-admin|admin')) {
            return view('backend.admin.create_teacher');
        } else {
            return redirect()->route('login');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'fullname'       => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'phoneno'       => 'required|numeric',
            'address'       => 'required|string',
            'date_of_birth' => 'required',
            'department'    => 'required|string',
            'subjects'       => 'required',
            'gender'        => 'required',
            'state'         => 'required|string',
            'city'          => 'required|string',
            'website'       => 'nullable',
            'profile'       => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'password'      => 'required|min:6',
            'confarmpassword' => 'required|same:password',
        ]);

        $imagePath = $request->hasFile('profile')
            ? Storage::disk('public')->put('teachers', $request->file('profile'))
            : null;

        $nameParts = explode(" ", $request->fullname);

        $firstName = $nameParts[0];

        $lastName = $nameParts[1] ?? '';
        $user = User::create([
            'name'      => $request->fullname,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $user->assignRole(Role::findByName('teacher'));

        $user->teacher()->create([
            'phone'         => $request->phoneno ?? "--",
            'address'       => $request->address ?? "--",
            'date_of_birth' => $request->date_of_birth ?? "--",
            'postcode'      => $request->postcode ?? "--",
            'department'    => $request->department ?? "--",
            'gender'        => $request->gender ?? "--",
            'state'         => $request->state ?? "--",
            'city'          => $request->city ?? "--",
            'profile'       => $imagePath ?? "--",
            'description'   => $request->description ?? "--",
            'website'       => $request->website ?? "--",
            'facebook_url'  => $request->facebook ?? "--",
            'twitter_url'   => $request->twitter ?? "--",
            'linkedin_url'  => $request->linkedin ?? "--",
            'subject'       => $request->input('subjects', []),
            'education'     => $request->input('education', []),
        ]);

        return  redirect()->back()->with(['title' => 'Done', 'message' => 'Teacher data saved successfully!', 'type' => 'success']);
    }
}
