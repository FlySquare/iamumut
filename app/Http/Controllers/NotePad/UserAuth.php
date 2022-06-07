<?php

namespace App\Http\Controllers\NotePad;

use App\Http\Controllers\Controller;
use App\Models\NotePad\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserAuth extends Controller
{
    public function userLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Please fill in all fields'],404);
        }

        $user = users::where('username', $request->username)
            ->where('password',md5(md5($request->get('password'))))->first();
        if($user){
            return response()->json(['success' => true, 'user' => $user], 200);
        }else{
            return response()->json(['success' => false, 'message' => 'Invalid username or password'],404);
        }
    }

    public function userRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:App\Models\NotePad\users,username',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Please fill in all fields or this user may already exist'],404);
        }

        $user = new users();
        $user->username = $request->username;
        $user->password = md5(md5($request->get('password')));

        if($user->save()){
            return response()->json(['success' => true, 'user' => $user], 200);
        }else{
            return response()->json(['error' => false, 'message' => 'Server error'],500);
        }
    }
}
