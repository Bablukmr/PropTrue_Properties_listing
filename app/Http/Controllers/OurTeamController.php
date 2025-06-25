<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Str;

class OurTeamController extends Controller
{
    public function index()
    {
        $members = OurTeam::all();
        return view('admin.our_team.ourteam', compact('members'));
    }

    public function create()
    {
        return view('admin.our_team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'short_desc'   => 'required|string',
            'user_id'       => 'nullable|email|unique:users,email|max:255',
            'password'      => 'nullable|string|min:6',
            'joining_date'  => 'nullable|date',
            'employee_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fb_id_link'         => 'nullable|url',
            'twitter_link'       => 'nullable|url',
            'linkedin_link'      => 'nullable|url',
            'instagram_link'     => 'nullable|url',
            'status'        => 'boolean',
            'user_type'     => 'required|in:1,2',
            'display_on_team' => 'boolean',
        ]);

        $data = $request->except(['employee_image', 'password']);

        // Create user in users table if user_id is provided
        if (!empty($request->user_id)) {
            $userData = [
                'name' => $request->employee_name,
                'email' => $request->user_id,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user = User::create($userData);
            $data['user_tb'] = $user->id;
        }

        // Upload image to public folder
        if ($request->hasFile('employee_image')) {
            $image = $request->file('employee_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/team_images');

            // Create directory if not exists
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $image->move($path, $filename);
            $data['employee_image'] = 'uploads/team_images/' . $filename;
        }

        OurTeam::create($data);

        return redirect()->route('our_team.index')->with('success', 'Team member added.');
    }

    public function show(OurTeam $our_team)
    {
        return view('admin.our_team.show', compact('our_team'));
    }

    public function edit(OurTeam $our_team)
    {
        return view('admin.our_team.edit', compact('our_team'));
    }

    public function update(Request $request, OurTeam $our_team)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'short_desc'   => 'required|string',
            'user_id'       => 'nullable|email|max:255|unique:users,email,' . ($our_team->user_tb ?? 'NULL'),
            'password'      => 'nullable|string|min:6',
            'joining_date'  => 'nullable|date',
            'employee_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fb_id_link'         => 'nullable|url',
            'twitter_link'       => 'nullable|url',
            'linkedin_link'      => 'nullable|url',
            'instagram_link'     => 'nullable|url',
            'status'        => 'boolean',
            'user_type'     => 'required|in:1,2',
            'display_on_team' => 'boolean',
        ]);

        $data = $request->except(['employee_image', 'password']);

        // Handle User Update/Creation
        if (!empty($request->user_id)) {
            if ($our_team->user_tb) {
                // Update existing user
                $user = User::find($our_team->user_tb);
                if ($user) {
                    $user->name = $request->employee_name;
                    $user->email = $request->user_id;

                    if ($request->filled('password')) {
                        $user->password = Hash::make($request->password);
                    }
                    $user->save();
                }
            } else {
                // Create new user
                $userData = [
                    'name' => $request->employee_name,
                    'email' => $request->user_id,
                    'password' => $request->filled('password')
                        ? Hash::make($request->password)
                        : Hash::make(Str::random(10)),
                ];
                $user = User::create($userData);
                $data['user_tb'] = $user->id;
            }
        } elseif ($our_team->user_tb) {
            // Remove user association if user_id is empty
            $data['user_tb'] = null;
        }

        // Handle Password Update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            // Keep the existing password if not provided
            unset($data['password']);
        }

        // Handle Image Update
        if ($request->hasFile('employee_image')) {
            // Delete old image if exists
            if ($our_team->employee_image && file_exists(public_path($our_team->employee_image))) {
                unlink(public_path($our_team->employee_image));
            }

            // Save new image to public folder
            $image = $request->file('employee_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/team_images');

            // Create directory if not exists
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $image->move($path, $filename);
            $data['employee_image'] = 'uploads/team_images/' . $filename;
        } else {
            // Keep the existing image if not updated
            $data['employee_image'] = $our_team->employee_image;
        }

        // Update our_team record
        $our_team->update($data);

        return redirect()->route('our_team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(OurTeam $our_team)
    {
        // Delete image if exists
        if ($our_team->employee_image && file_exists(public_path($our_team->employee_image))) {
            unlink(public_path($our_team->employee_image));
        }

        // Delete related user if exists
        if ($our_team->user_tb) {
            // Delete related user permissions
            \DB::table('user_permission')->where('user_id', $our_team->user_tb)->delete();

            // Delete user
            User::where('id', $our_team->user_tb)->delete();
        }

        $our_team->delete();
        return redirect()->route('our_team.index')->with('success', 'Team member deleted.');
    }
}
