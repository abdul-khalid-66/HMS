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
            'password'      => 'required|min:6',
            'confarmpassword' => 'required|same:password',
            'address'       => 'required|string',
            'postcode'      => 'required|string',
            'department'    => 'required|string',
            'state'         => 'required|string',
            'city'          => 'required|string',
            'website'       => 'nullable|url',
            'profile'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);


        $imagePath = $request->hasFile('profile')
            ? Storage::disk('public')->put('teachers', $request->file('profile'))
            : null;

        $user = User::create([
            'name'      => $request->fullname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $user->assignRole(Role::findByName('teacher'));

        $user->teacher()->create([
            'phone'         => $request->phoneno,
            'address'       => $request->address,
            'profile'       => $imagePath,
            'department'    => $request->department,
            'gender'        => $request->gender,
            'date_of_birth' => $request->finish,
            'postcode'      => $request->postcode,
            'description'   => $request->description,
            'state'         => $request->state,
            'city'          => $request->city,
            'website'       => $request->website,
            'facebook_url'  => $request->facebook_url,
            'twitter_url'   => $request->twitter_url,
            'linkedin_url'  => $request->linkedin_url,
        ]);

        return  redirect()->back()->with(['title' => 'Done', 'message' => 'Teacher data saved successfully!', 'type' => 'success']);
    }
}
