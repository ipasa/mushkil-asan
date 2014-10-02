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
    public function editQuestions($id){
        if(!$this->question_belongs_to_users($id)){
            return  Redirect::route('ypquestion')
                    ->with('global','you are not able to eit this question');
        }
        return  View::make('profile.editQuestion')
                ->with('title', "Edit Section")
                ->with('question', Question::find($id));
    }
    public function updateQuestions(){
        $id =   Input::get('update_question_id');
        $validator = Validator::make(Input::all(), array(
            'questionTitle'     =>  'required|max:155',
            'question'          =>  'required|max:255'
        ));

        if($validator->fails()){
            return  Redirect::route('edit-question', $id)
                    ->withErrors($validator);
        }else{
            $id                 =   Input::get('update_question_id');
            $questionTitle      =   Input::get('questionTitle');
            $question           =   Input::get('question');

            $updateQuestion                 =   Question::find($id);
            $updateQuestion->questiontitle  =   $questionTitle;
            $updateQuestion->question       =   $question;
            $updateQuestion->solved         =   Input::get('solved');
            $updateQuestion->save();

            return  Redirect::route('ypquestion')
                ->with('global', 'Your Question Success Fully Updated');

        }
    }

    private function question_belongs_to_users($id){
        $question   =   Question::find($id);
        if($question->user_id==Auth::user()->user_id){
            return true;
        }
        return false;
    }
}