<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    
    public function index() {
        //
        $users = User::orderBy('name')->get();
        return view('auth.admin.index',['users' => $users]);
    }

    public function create() {
        //
        return view('auth.admin.create');
    }

    public function store(Request $request)
    {
         
          $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8',
                'type'=>'required|string|in:user,root'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user = new User($request->all());
        $user->password = Hash::make($request->password);
         
        try{
           
            $result = $user->save();
            return redirect('admin')->with(['message'=> 'The user has been seaved']);
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back()->withInput()->withErrors(['message'=> 'The user has not been seaved']);
        }
    }

    public function show($id) {
        $user = User::find($id);
        if($user == null) return redirect(404);
        return view('auth.admin.show',['user' => $user,
        'menssage' => ($user->email_verified_at != null ? 'Este pefil esta verificado.' : 'Este pefil todavia no esta verificado.')]);
    }
    
    public function edit(string $id) {
        $user = User::find($id);
        if($user == null) return abort(404);
        $typeOptions = ['root' => 'Root', 'user' => 'User'];
        return view('auth.admin.edit', ['user' => $user, 'typeOptions' => $typeOptions]);
    }
    
    public function update(Request $request, string $id) {
        $user = User::find($id);
        // Esta variable la pondremos a true si en algun if debemos guardar el modelo
        $save = false;
    
        if(trim($request->type) != '' && $user->type != 'root') {
            // Validamos el tipo
            $validator = Validator::make($request->all(), [
                'type' => 'required|string|in:user,root',
            ]);
            if($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            }
            $user->type = trim($request->type);
            // Actualizo el tipo 
            $save = true;
        }
        if(trim($request->name) != '') {
            // Validamos el nombre
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
            ]);
            if($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            }
            $user->name = trim($request->name);
            // Actualizamos el nombre
            $save = true;
        }
        if(trim($request->email) != '') {
            // Validamos el email
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            ]);
            if($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            }
            $user->email = trim($request->email);
            // verficicamos el email
            $timestamp = Carbon::now();
            $timestamp = $timestamp->format('Y-m-d h:i:s');
            $user->email_verified_at = $timestamp;
            // Actualizamos el email
            $save = true;
        }
        if(trim($request->password) != '') {
            // Validamos la contraseña
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8'],
            ]);
            if($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            }
            $user->password = Hash::make($request->password);
            // Actualizamos la contraseña
            $save = true;
        }
    
        if($save) {
            try {
                $user->save();
                return redirect('admin/' . $user->id . '/edit')->with(['message' => 'User profile updated correctly.']);
            } catch(\Exception $e) {
                return back()->withInput()->withErrors(['error' => 'User profile not updated.']);
            }
        }
    }

    public function destroy($id) {
        try {
          User::destroy($id);
          return redirect('admin')->with('success', 'Usuario eliminado correctamente.');
        } catch(\Exception $e) {
           return back()->withErrors(['message' => 'The user has not been deleted.']);
        }
    }
}
