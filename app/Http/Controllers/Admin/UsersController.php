<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function showUsers()
    {
        $users=User::all()->sortBy('name');
        return view('admin.users')->with('users', $users);
    }

    public function newUser()
    {
        return view('admin.users-new');
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = new User;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->role=$request->role;
        $user->password= bcrypt($request->password);

        if($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/users', $photoName);

            $user->photo = $photoName;
        }

        $user->save();

        return redirect(route('users'));
    }

    public function showEditForm($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users-edit')->with('user', $user);
    }

    public function updateUsers(UpdateUserRequest $request, $id)
    {
        $this->validate($request,
        [
            'email'=>'unique:users, email,' . $id
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
        $user->role=$request->role;

        if($request->verified=='mark')
        {
            $user->email_verified_at=now();
            $mess = "account validation successful";
        }

        if($request->verified=='invalid')
        {
            $user->email_verified_at=null;
            $mess = "invalid account";
        }

        if($request->verified=='send')
        {
            $user->email_verified_at=null;
            $user->sendEmailVerificationNotification();
            $mess = "Email sent successfully";
        }

        $user->save();

        return redirect(route('users'))->with('success', $mess);
    }


}
