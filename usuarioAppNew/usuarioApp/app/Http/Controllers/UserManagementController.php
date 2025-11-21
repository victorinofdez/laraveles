<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller {
    
    function __construct() {
        //$this->middleware('prueba', ['only' => ['rutaProtegida']]);
        //$this->middleware('prueba', ['except' => ['rutaProtegida']]);
        $this->middleware('verified');
        $this->middleware('root', ['only' => ['admin', 'root']]);
    }
    
    function admin() {
        $user = User::all();
        return view('admin.index');
    }
    
    function password(Request $request) {
         $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator->getMessageBag());
        }
        $oldpassword = $request->oldpassword;
        $user = $request->user();
        if(password_verify($oldpassword, $user->password)) {
            $user-> password =  Hash::make($request['password']);
            $user->save();
            return redirect('profile')->with(['message' => 'User password edited.']);
        }
        return redirect('profile')->with(['message' => 'User password not edited because old password is not correct.']);
    }
    
    function profile(Request $request) {
        $user = $request->user();
        return view('auth.profile', ['user' => $request->user()]);
    }
    
    function root() {
        dd([]);
    }
    
    function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);
        if($validator->fails()) {
            return back()->withInput->withErrors($validator->getMessageBag());
        }
        $user = $request->user();
        try {
            if( $request->email != $user->email && $user->type != 'root' ) {
                $user->email_verified_at = null;
            }
            $user->update($request->all());
            return redirect('profile')->with(['message' => 'User edited.']);
        } catch(\Exception $e) { 
            return redirect('profile')->with(['message' => 'User not edited.']);
        }
    }
    
    
}
