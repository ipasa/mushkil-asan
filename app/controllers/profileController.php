<?php

class profileController extends BaseController {
    public function user($username){

        $user   =   User::where('username', '=', $username);

        if($user->count()){

            $user       =   $user->first();

            return  View::make('profile.view')
                    ->with('title', 'Personal Profile Page')
                    ->with('singleuser', $user)
                    ->with('yourquestion', Question::UserQusetion($user->user_id));
        }

        return App::abort(404);
    }
    public function personalQuestions(){
        return  View::make('profile.questionPersonal')
                ->with('title', 'Your Question')
                ->with('allQuestions', Question::yourQusetion());
    }
}