<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SchoolRegisterRequest;

class UserController extends Controller
{
    public function register(Request $request, SchoolRegisterRequest $schoolRegisterRequest){
        $request->validate([
            'name'    =>  'required',
            'email'   =>  'required|email',
            'password'=>  'required|confirmed',
            'website' =>  'required',
        ]);
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $school = School::create([
            'user_id'    => $user->id,   
            'website' => $schoolRegisterRequest->website, 
            'strength'=> $schoolRegisterRequest->strength, 
            'phone'   => $schoolRegisterRequest->phone, 
        ]);
        $address = Address::create([
            'school_id' => $school->id,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
        ]);
        $school->address_id = $address->id;
        $school->save();
        $token = $user->createToken('myToken')->plainTextToken;

        return response([
            'token' => $token,
            'user'  => $user,
            'school'=> $school,
        ],200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Successfully Logged Out !!'
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'The provided Credentials are incorrect.'
            ],401);
        }
        $token = $user->createToken('myToken')->plainTextToken;

        return response([
            'token' => $token,
            'user' => $user,
        ],200);

    }
}
