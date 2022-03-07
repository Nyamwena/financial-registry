<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CreateUsersController extends Controller
{
    public function index(){

        $users = User::all();
        $roles = Role::all();

        if(Gate::allows('is-admin')){
            return view('admin.create', compact('users', 'roles'));
        }
        return redirect()->back();
    }

    public function createUser(Request $request)
    {

        try {
            DB::beginTransaction();


            $users = User::create($request->except(['_token','roles']));

            $users->roles()->sync($request->roles);

            DB::commit();
            return redirect()->back()->with('success','User Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('info', $exception->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::all();

        return view('admin.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->update($request->except(['_token','roles']));

            $user->roles()->sync($request->roles);
            // $users->roles()->sync($request->roles);

            return  redirect()->to('admin/view')->with('success', 'Updated Successfully' );
        } catch (\Exception $exception){
            // dd($exception->getMessage());
            return redirect()->to('admin/view')->with('info', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::destroy($id);

            return  redirect()->back()->with('success', 'Deleted Successfully' );
        } catch (\Exception $exception){
            return redirect()->back()->with('info', $exception->getMessage());
        }

    }
}
