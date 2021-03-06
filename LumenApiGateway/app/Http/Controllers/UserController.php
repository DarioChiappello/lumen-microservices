<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    /**
     * Return a list of all Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->successResponse($users);
    }

    /**
     * Create a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }


    /**
     * Get a User.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);

        return $this->successResponse($user);
    }

    /**
     * Update a User.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $rules = [
            'name' => 'max:255',
            'email' => 'email|unique:users,email, ' . $user,
            'password' => 'min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($user);

        $user->fill($request->all());

        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }

        if($user->isClean()){
            return $this->errorResponse('At least one value must be different from the old one', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->successResponse($user);
    }

    /**
     * Delete a User.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->successResponse($user); 
    }

    /**
     * Identify an existing User.
     *
     * @return \Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
