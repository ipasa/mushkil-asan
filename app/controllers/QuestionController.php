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
            'questionTitle'     =>  'required|max:155',
            'question'          =>  'max:655'
        ));

        if($validator->fails()){
            return  Redirect::route('ask-question')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $questionTitle      =   Input::get('questionTitle');
            $question           =   Input::get('question');
            $user_id            =   Auth::user()->user_id;

            $singlequestion =  Question::create(array(
                'user_id'           =>  $user_id,
                'questiontitle'     =>  $questionTitle,
                'question'          =>  $question
            ));

            return  Redirect::route('home')
                    ->with('global', 'Your Question Success Fully Submitted');

        }
    }

    public function singleQuestion($qid){
        $insertView             =   Question::find($qid);

        $currentNumberOfView    =   $insertView->numsofview;
        $insertView->numsofview =   $currentNumberOfView+1;
        $insertView->save();

        return  View::make('questions.single-question')
                ->with('title', 'Single Question')
                ->with('singleQuestion', Question::find($qid)
        );
    }

}