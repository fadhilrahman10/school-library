<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd();

        $request->validate([
            'name' => 'required|string',
            'old_password' => 'required',
            'password' => ['required', 'min:8'],
            'confirm_password' => ['required|same:password'],
        ]);

        $check = Hash::check($request->old_password, auth()->user()->password);

        if ($check) {
            $data = [
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ];
            $user->update($data);

            return to_route('reset-password', $user->id)->with('success', 'password has been updated');
        } else {
            return to_route('reset-password', $user->id)->with('failed', 'failed to change password');
        }
    }
}
