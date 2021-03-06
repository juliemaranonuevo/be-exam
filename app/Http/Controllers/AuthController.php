<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        
        $login = request()->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        request()->merge([$fieldType => $login]);

        $remember = $request->has('remember') ? true : false;
        
        $credentials = request([$fieldType, 'password']);
        
        if ( !Auth::attempt($credentials, $remember) ) {
          
            return back()->with('custom_error_message','Invalid Credentials!')->withInput( $request->all );

        }

        return redirect('/');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        return response()->json([
            "message" => 'Success',
        ], 200);
    }

}
