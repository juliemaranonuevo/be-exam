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
        // if ($fieldType == 'email') {
        //     $request->validate([
        //         'email' => 'required|string|email',
        //         'password' => 'required|string'
        //     ]);
        // } else {
        //     $request->validate([
        //         'username' => 'required|string',
        //         'password' => 'required|string'
        //     ]);
        // }
        

        request()->merge([$fieldType => $login]);
        

        $credentials = request([$fieldType, 'password']);
     
        if ( !Auth::attempt($credentials) ) {
          
            return back()->withErrors('Invalid email or password')->withInput( $request->all );

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
        //save the user action.
        $auditTrail = new AuditTrail;
        $auditTrail->action = 'Logged Out.';
        $auditTrail->user_id = Auth::user()->id;
        $auditTrail->save();

        Auth::logout();

        return redirect('/');
    }

}
