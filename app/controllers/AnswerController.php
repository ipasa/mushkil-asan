<?php

class AnswerController extends BaseController{

    public $restful = true;
    public function answerQuestion(){
        $validator      =   Validator::make(Input::all(), Answer::$rules);

        $question_id    =   Input::get('question_id');

        if($validator->fails()){
            return  Redirect::route('single-question', $question_id)
                    ->withErrors($validator)
                    ->withInput();
        }else{

            $insertAnswer                   =   new Answer();
            $insertAnswer->user_id          =   Auth::user()->user_id;
            $insertAnswer->question_id      =   $question_id;
            $insertAnswer->answer           =   Input::get('answer');
            $insertAnswer->save();

            return  Redirect::route('single-question', $question_id)
                ->with('global', 'Answer is successfully posted');

        }
    }
}