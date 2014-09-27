<?php

class profileController extends BaseController {
    public function user($username){

        $user = User::where('username', '=', $username);
        if($user->count()){

            $user = $user->first();

            return  View::make('profile.view')
                    ->with('title', 'Personal Profile Page')
                    ->with('singleuser', $user);
        }

        return App::abort(404);
    }
}