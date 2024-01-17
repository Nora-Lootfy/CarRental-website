<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $users = DB::table('users')->get();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:255',
            'email'     => 'required|email',
            'password'  => 'required',
            'active'    => 'sometimes'
        ]);

        $data['active'] = isset($request['active']);
        $data['password'] = Hash::make($request['password']);

        $data['email_verified_at'] = Carbon::now();

        DB::table('users')->insert($data);

        return redirect()->route('users');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :RedirectResponse|View
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        if(!is_null($user))
            return view('admin.editUser', compact('user'));
        else
            return redirect()->route('users');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:255',
            'email'     => 'required|email',
            'password'  => 'sometimes',
            'active'    => 'sometimes'
        ]);

        $data['active'] = isset($request['active']);

        if(!is_null($request['password']))
            $data['password'] = Hash::make($request['password']);
        else
            unset($data['password']);

        $data['updated_at'] = Carbon::now();

        DB::table('users')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('users');
    }

}
