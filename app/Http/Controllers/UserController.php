<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;




class UserController extends MainController
{

    function __construct()
    {
        parent::__construct();
        //the middleware will operate on every method except logout method
        $this->middleware('signguard', ['except' => ['logout']]);
    }

    public function getSignin()
    {
        self::$data['title'] = 'Signin Page';
        return view('forms.signin', self::$data);
    }

    public function postSignin(SigninRequest $request)
    {
        $rd = !empty($request['rd']) ? $request['rd'] : '';
        if (User::validateUser($request['email'], $request['password'])) {
            return redirect($rd);
        } else {
            self::$data['title'] = 'Signin Page';
            return view('forms.signin', self::$data)
                ->withErrors('Wrong email or password');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('user/signin');
    }

    public function getSignup()
    {
        self::$data['title'] = 'Signup Page';
        return view('forms.signup', self::$data);
    }

    public function postSignup(SignupRequest $request)
    {
        //this line will be executed only if the request passed the validations on SignupRequest 
        User::save_new($request);
        return redirect('');
    }
}
