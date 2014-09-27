<?php

class QuestionController extends BaseController {

    public $restful = true;

    public function __construct(){
        $this->beforeFilter('auth', array('only'=>'getcreate'));
    }

    public function index(){
        return  View::make('questions.index')
                ->with('title', 'Ask a question');
    }

    public function getCreate(){
        $validator = Validator::make(Input::all(), array(
            'question'  =>  'required|max:255'
        ));

        if($validator->fails()){
            return  Redirect::route('ask-question')
                    ->withErrors($validator);
        }else{
            $question   =   Input::get('question');
            $user_id    =   Auth::user()->user_id;

            $singlequestion =  Question::create(array(
                'user_id'   =>  $user_id,
                'question'  =>  $question
            ));

            return  Redirect::route('home')
                    ->with('global', 'Your Question Success Fully Submitted');

        }
    }
}