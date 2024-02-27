<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return User[]|\Illuminate\Contracts\Support\Renderable|\Illuminate\Database\Eloquent\Collection
     */
    public function allUsers()
    {
        return User::all();
    }

    /**
     * @param $id
     * @param $name
     * @param $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id, $name, $email)
    {
        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->save();

        return response()->json(User::find($id));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $userDelete = $user->name;
        $user->delete();
        $userInfo = "User $userDelete was deleted!";
        return response()->json($userInfo);
    }
}
