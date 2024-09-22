<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserListController extends Controller
{
    // Display a listing of the users with optional search functionality
    public function index(Request $request)
    {
        $query = User::query();

        // Check if a search term is provided
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('userType', 'LIKE', "%{$searchTerm}%");
        }

        // Fetch users with pagination
        $users = $query->paginate(10); // Adjust the number per page as needed

        return view('userlist.index', compact('users'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('userlist.index')->with('error', 'User not found.');
        }

        return view('userlist.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'userType' => 'required|in:ADMIN,USER',
        ]);

        if ($validator->fails()) {
            return redirect()->route('userlist.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Update the user type
        $user->userType = $request->input('userType');
        $user->save();

        return redirect()->route('userlist.index')->with('success', 'User type updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userlist.index')->with('success', 'User deleted successfully.');
    }
}
