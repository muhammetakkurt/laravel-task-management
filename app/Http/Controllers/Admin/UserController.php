<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view("admin.users.list" , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '<>' , 'Super Admin')->get();
        return view('admin.users.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'email_verified_at' => now(),
            'password' => Hash::make($request->get('password')), // password
            'remember_token' => Str::random(10),
        ]);

        if($request->roles)
        {
            foreach ($request->roles as $guardName => $roles){
                foreach ($roles as $role){
                    $roleToAssign = Role::findByName($role , $guardName);
                    $user->assignRole($roleToAssign);
                }
            }
        }

        return redirect()->route('admin.users.index')->withSuccess('User has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('name', '<>' , 'Super Admin')->get();
        return view('admin.users.edit' , compact('roles' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        if(!$user->hasRole('Super Admin')){
            $user->roles()->detach();
            foreach ($request->roles as $guardName => $roles){
                foreach ($roles as $role){
                    $roleToAssign = Role::findByName($role , $guardName);
                    $user->assignRole($roleToAssign);
                }
            }
        }
        return redirect()->route('admin.users.index')->withSuccess('Your changes have been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->hasRole('Super Admin')) abort(401, 'You can not delete this user!');
        $user->delete();
        return redirect()->route('admin.users.index')->withSuccess('User has been deleted!');
    }
}
