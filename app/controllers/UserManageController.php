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
                        ->with('global', 'Your Account Has been activated now, Please Login');
            }
        }else{

            //if some problem, not activate this account
            return Redirect::route('home')
                ->with('global', 'You are already Activated or some problem.');

        }
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
                        ->with('error-message', 'Sorry, your User-name and Password Doesnot match or are you activated')
                        ->withInput();
            }
        }

        return  Redirect::route('login')
            ->with('error-message', 'Are you activated');
    }

    /*Changing Password*/
    public function getchangePassword(){
        return View::make('users.changepassword')
                ->with('title', 'Change Your Password');
    }
    public function postchangePassword(){

        $rules = array(
            'old-password'          =>  'required',
            'new-password'          =>  'required|min:6',
            'new-password-again'    =>  'required|same:new-password'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return  Redirect::route('change-password')
                    ->withErrors($validator)
                    ->withInput();
        }else {
            $user = User::find(Auth::user()->user_id);

            $oldPassword        =   Input::get('old-password');
            $newPassword        =   Input::get('new-password');

            if(Hash::check($oldPassword, $user->getAuthPassword())){

                $user->password =   Hash::make($newPassword);

                if($user->save()){
                    return  Redirect::route('home')
                            ->with('global', 'Your Password Has been Changed');
                }
            }else {
                return  Redirect::route('change-password')
                    ->with('error-message', 'Your Old Password is Incorrect');
            }
        }
        return  Redirect::route('change-password')
            ->with('error-message', 'Their is some error, we could not change your pasword. try again later');
    }

    /*Forget Password*/
    public function forgetPass(){
        return View::make('users.forget')
            ->with('title',"Forget Password");
    }
    public function postforgetPass() {
        /*
         * Validation
        */
        $validation = Validator::make(Input::all(), array(
            'email'     =>  'required|email'
        ));
        if($validation->fails()){
            return  Redirect::route('forget-password')
                ->withErrors($validation)
                ->withInput();
        }
        else {
            //Change the Password
            $user = User::where('email', '=', Input::get('email'));

            if($user->count()){
                $user   =   $user->first();

                /*Generatea new Code to reset account*/
                $code       =   str_random(60);
                $password   =   str_random(10);

                $user->code             =   $code;
                $user->password_temp    =   Hash::make($password);

                if($user->save()){
                    Mail::send('emails.auth.forget', array(
                        'link'       =>  URL::route('account-recover',$code),
                        'username'  =>  $user->username,
                        'password'  =>  $password
                    ),function($message) use ($user){
                        $message->to($user->email, $user->username)->subject('Your new password');

                    });
                    return Redirect::route('home')
                        ->with('global', 'We send you a new password');
                }


            }
        }
        return Redirect::route('forget-password')
                ->with('global', 'Could not request a Password');
    }
    public function getRecover($code){
        $user   =   User::where('code', '=', $code)
                    ->where('password_temp', '!=', '');

        if($user->count()){
            $user   =   $user->first();

            $user->password         =   $user->password_temp;
            $user->password_temp    =   '';
            $user->code             =   '';

            if($user->save()){
                return Redirect::route('home')
                    ->with('global', 'Your account has been recovered and you can sihn inwith your new password');
            }
        }
        return Redirect::route('home')
            ->with('global', 'Could not recover your account');
    }

    /*Login Out User*/
    public function logoutUser() {
        Auth::logout();
        return Redirect::route('home')
                ->with('global', 'you are logout');
    }
}