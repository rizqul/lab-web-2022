<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate();

        return view('dashboard.users', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:225'],
            'biography' => [''],
        ]);

        if ($request->file('img-file')) {
            $validated['img_src'] = $request->file('img-file')->store('post-images');
        } else {
            $validated['img_src'] = $request['img-url'];
        }

        $validated['password'] = Hash::make($validated['password']);

        // dd($validated);
        User::create($validated);

        return redirect(route('users'));
    }

    public function getUser($id)
    {
        $test = User::find($id);

        return response()->json(
            [
                'id' => $test->id,
                'name' => $test->name,
                'email' => $test->email,
                'username' => $test->username,
                'password' => $test->password,
                'is_admin' => $test->is_admin,
                'status' => $test->status,
                'biography' => $test->biography,
            ],
            200,
        );
    }

    public function update(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:users,name,' . $request->id,
            'username' => 'required|max:255|unique:users,username,' . $request->id,
            'email' => 'required|email:dns|unique:users,email,' . $request->id,
            'password' => 'required|min:6|max:225',
            'biography' => [''],
        ]);

        if ($request->file('img-file')) {
            $validated['img_src'] = $request->file('img-file')->store('post-images');
        } else {
            $validated['img_src'] = $request['img-url'];
        }

        $validated['password'] = Hash::make($validated['password']);

        $user = User::find($request->id);
        $user->update($validated);

        return redirect(route('users'));
    }

    public function delete($id)
    {
        User::find($id)->delete();
    }
}