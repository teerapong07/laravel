<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function list(){
        $users = DB::table('users')->orderBy('id', 'desc')->get();
        return view('users.list', compact('users'));
    }

    public function form(){
        $id = null;
        $name = null;
        $email = null;
        $password = null;

        return view('users.form', compact('id', 'name', 'email', 'password'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return redirect('/users/form')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user =DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect('/users');
    }

    public function edit($id){
        $user = DB::table('users')->where('id', $id)->first();

        if(isset($user)){
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
            $password = $user->password;
        }
        return view('users.form', compact('id', 'name', 'email', 'password'));
    }

    public function update(Request $request, $id){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect('/users');
    }

    public function delete($id){
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }

    public function signIn(){
        return view('users.signIn');
    }

    public function signInProcess(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect('/user/signIn')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('email', $email)->first();

        if(isset($user)){
            if($user->password == $password){
                $request->session()->put('user_id', $user->id);
                return redirect('/backoffice');
            }
        }else{
            return redirect('/user/signIn')->withErrors(['search' => 'Invalid email or password']);
        }
    }

    public function signOut(Request $request){
        $request->session()->forget('user_id');
        return redirect('/user/signIn');
    }

    public function info(){
        $user_id = session('user_id');
        $user = DB::table('users')->where('id', $user_id)->first();

        return view('users.info', compact('user'));
    }
}

