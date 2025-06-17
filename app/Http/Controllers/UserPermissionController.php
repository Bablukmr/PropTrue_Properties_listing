<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPermission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserPermissionController extends Controller
{
    public function index()
    {
        $permissions = UserPermission::with('user')->get();
        return view('admin.user_permission.index', compact('permissions'));
    }

    public function create()
    {
        $users = User::all(); // Or filter only those without permission

        return view('admin.user_permission.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:user_permission,user_id',
        ]);

        $data = $request->only([
            'user_id',
            'all_property',
            'featured_property',
            'add_new_property',
            'enquiry',
            'our_team',
            'blog',
            'career',
            'legal',
        ]);

        // Convert checkbox nulls to 0
        foreach (['all_property', 'featured_property', 'add_new_property', 'enquiry', 'our_team', 'blog','career','legal'] as $field) {
            $data[$field] = $request->has($field) ? 1 : 0;
        }

        UserPermission::create($data);

        return redirect()->route('user_permission.index')->with('success', 'Permission added successfully.');
    }
    
    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        $permission = UserPermission::where('user_id', $userId)->first();

        return view('admin.user_permission.edit', compact('user', 'permission'));
    }

    public function update(Request $request, $userId)
    {
         $permissionKeys = [
            'all_property',
            'featured_property',
            'add_new_property',
            'enquiry',
            'our_team',
            'blog',
            'career',
            'legal',
        ];
        
        // print_r($_REQUEST); exit;

        // Convert checkbox nulls to 0
        $data = [];

        foreach ($permissionKeys as $key) {
            $data[$key] = $request->has($key) ? 1 : 0;
        }
    
        UserPermission::updateOrCreate(
            ['user_id' => $userId],
            $data
        );

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }
}
