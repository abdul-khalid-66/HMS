<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    public function index()
    {
        if (Auth::user() && auth()->user()->hasRole('super-admin|admin')) {
            $teachers = Teacher::with('user')->get();
            return view('backend.admin.all_teachers', compact('teachers'));
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


        if ($request->hasFile('profile')) {
            $imagePath = Storage::disk('backend')->put('teachers', $request->file('profile'));
        } else {
            $imagePath = null;
        }


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

    public function show($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);
        return view("backend.admin.show_teacher", compact('teacher'));
    }

    public function edit($id)
    {

        $teacher = Teacher::with('user')->findOrFail($id);
        return view('backend.admin.edit_teacher', compact('teacher'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname'       => 'required|string|max:255',
            'email'          => 'required|email',
            'phoneno'        => 'required|numeric',
            'address'        => 'required|string',
            'date_of_birth'  => 'required|date',
            'department'     => 'required|string',
            'subjects'       => 'required|array',
            'education'      => 'required|array',
            'gender'         => 'required',
            'state'          => 'required|string',
            'city'           => 'required|string',
            'website'        => 'nullable|url',
            'password'       => 'nullable|min:6',
            'confirm_password' => 'nullable|same:password',
        ]);


        $teacher = Teacher::findOrFail($id);

        if ($request->hasFile('profile')) {
            if ($teacher && $teacher->profile && Storage::disk('backend')->exists($teacher->profile)) {
                Storage::disk('backend')->delete($teacher->profile);
            }
            $imagePath = Storage::disk('backend')->put('teachers', $request->file('profile'));
        } else {
            $imagePath = $teacher->profile ?? null;
        }

        $teacher->update([
            'phone'         => $request->phoneno,
            'address'       => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'postcode'      => $request->postcode,
            'department'    => $request->department,
            'gender'        => $request->gender,
            'state'         => $request->state,
            'city'          => $request->city,
            'profile'       => $imagePath,
            'description'   => $request->description,
            'website'       => $request->website,
            'facebook_url'  => $request->facebook,
            'twitter_url'   => $request->twitter,
            'linkedin_url'  => $request->linkedin,
            'subject'       => $request->input('subjects', []),
            'education'     => $request->input('education', []),
        ]);

        $nameParts = explode(" ", $request->fullname);
        $firstName = $nameParts[0];
        $lastName  = $nameParts[1] ?? '';

        $teacher->user->update([
            'name'       => $request->fullname,
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'email'      => $request->email,
        ]);

        // $user = User::find($id);

        // $nameParts = explode(" ", $request->fullname);
        // $firstName = $nameParts[0];
        // $lastName  = $nameParts[1] ?? '';

        // $userData = [
        //     'name'       => $request->fullname,
        //     'first_name' => $firstName,
        //     'last_name'  => $lastName,
        //     'email'      => $request->email,
        // ];

        // // Update password only if provided
        // if ($request->password) {
        //     $userData['password'] = Hash::make($request->password);
        // }

        // $user->update($userData);

        // // Handle profile image upload
        // if ($request->hasFile('profile')) {
        //     if ($user->teacher && $user->teacher->profile && Storage::disk('backend')->exists($user->teacher->profile)) {
        //         Storage::disk('backend')->delete($user->teacher->profile);
        //     }
        //     $imagePath = Storage::disk('backend')->put('teachers', $request->file('profile'));
        // } else {
        //     $imagePath = $user->teacher->profile ?? null; // Retain the existing profile image
        // }

        // // Update teacher data
        // if ($user->teacher) {
        //     $user->teacher->update([
        //         'phone'         => $request->phoneno,
        //         'address'       => $request->address,
        //         'date_of_birth' => $request->date_of_birth,
        //         'postcode'      => $request->postcode,
        //         'department'    => $request->department,
        //         'gender'        => $request->gender,
        //         'state'         => $request->state,
        //         'city'          => $request->city,
        //         'profile'       => $imagePath,
        //         'description'   => $request->description,
        //         'website'       => $request->website,
        //         'facebook_url'  => $request->facebook,
        //         'twitter_url'   => $request->twitter,
        //         'linkedin_url'  => $request->linkedin,
        //         'subject'       => $request->input('subjects', []),
        //         'education'     => $request->input('education', []),
        //     ]);
        // }

        return redirect()->back()->with(['title' => 'Done', 'message' => 'Teacher data saved successfully!', 'type' => 'success']);
    }
}
