<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ResetPasswordRequest;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile($id)
    {

        if(auth()->user()->id == $id)
        {
                $user = User::findOrFail($id);
                return view('admin.user-profile')->with('user', $user);
        }

            return back();
        }

    public function updateProfile(UpdateUserRequest $request, $id)
    {
        if (auth()->user()->id == $id) {
            $this->validate($request,
                [
                    'email'=>'unique:users,email,' . $id
                ],
                [
                    'email.unique' => 'this email address is already registered'
                ]
            );

            $user = User::findOrFail($id);

            if ($request->hasFile('photo')) {

                // delete image after upload new img
                if(!($user->photo == 'default.jpg')){

                    File::delete('images/users/' . $user->photo);
                }

                $extension = $request->file('photo')->getClientOriginalExtension();
                $photoName = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;

                $request->file('photo')->move('images/users', $photoName);

                $user->photo = $photoName;
            }

            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;

            $user->save();

            return redirect(route('dasboard'));
        }
        return back();

    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        if(Auth::attempt(['email' => auth()->user()->email, 'password' => $request->password])) {
            $password = bcrypt($request->password);
            $user = User::findOrFail(auth()->user()->id);
            $user->password = $password;

            $user->save();

            // return redirect(route('users'));
        }
    }

}
