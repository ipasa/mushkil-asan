<?php

class UserManageController extends BaseController {

    /*registering a new user*/
    public function getregisterUser() {
        return View::make('users.register')
            ->with('title', 'Sign-Up Page');
    }
    public function postregisterUser() {
        /*
         * Validation
        */
        $validation = Validator::make(Input::all(), array(
            'username'  =>  'required|max:20|min:5|unique:users',
            'fullname'  =>  'required|max:40',
            'email'     =>  'required|max:50|email|unique:users',
            'password'  =>  'required|min:6'
        ));
        if($validation->fails()){
            return  Redirect::route('registration')
                    ->withErrors($validation)
                    ->withInput();
        }
        else {
            //Create a user
            $username   =  Input::get('username');
            $fullname   =  Input::get('fullname');
            $email      =  Input::get('email');
            $password   =  Input::get('password');

            //Activation Code
            $code       =  str_random(60);

            $user =  User::create(array(
                'username'  =>  $username,
                'fullname'  =>  $fullname,
                'email'     =>  $email,
                'password'  =>  Hash::make($password),

                'code'      =>  $code,
                'active'    =>  0
            ));

            if($user){
                //Send mail
                Mail::send('emails.auth.activate', array(
                    'link'      =>  URL::route('activateAccount', $code),
                    'username'  =>  $fullname
                ), function($message) use ($user) {
                    $message->to($user->email, $user->fullname)
                            ->subject('Activate your account');
                });
                return  View::make('users.registerConfirm')
                        ->with('title', 'Registration SuccessFul')
                        ->with('userFullName', $fullname)
                        ->with('userEmail', $email);
            }
        }
    }
    public function activateAccountByEmail($code){
        $user = User::where('code', '=', $code)->where('active', '=', 0);

        if($user->count()){
            $user = $user->first();

            //Update User activate Data
            $user->active =1;
            $user->code   ='';

            if($user->save()){
                return  Redirect::route('login')
                        ->with('global', 'Your Account Has been activated now, Please Login');;// Need Some Edit
            }
        }

        //if some problem, not activate this account
        //Need some Edit
        return Redirect::route('home')
                ->with('global', 'You are already Activated or some problem.');
    }

    /*Login as a user*/
    public function getloginUser() {
        return View::make('users.login')
            ->with('title', 'Login Page');
    }
    public function postloginUser() {
        $validator = Validator::make(Input::all(), array(
            'email'     => 'required|email',
            'password'  =>  'required'
        ));

        if($validator->fails()){
            return  Redirect::route('login')
                    ->withErrors($validator)
                    ->withInput();
        }else {

            $rememberMe = (Input::has('remember'))?true:false;

            $auth = Auth::attempt(array(
                'email'     =>  Input::get('email'),
                'password'  =>  Input::get('password'),
                'active'    =>  1
            ), $rememberMe);

            if($auth){
                //Redirect to the intendented page
                return Redirect::intended('/');
            }else {
                return  Redirect::route('login')
                        ->with('error-message', 'Sorry, your User-name and Password Doesnot match or are you activated');
            }
        }

        return  Redirect::route('login')
            ->with('error-message', 'Are you activated');
    }

    public function logoutUser() {
        Auth::logout();
        return Redirect::route('home')
                ->with('global', 'you are logout');
    }
}