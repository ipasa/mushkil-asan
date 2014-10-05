<?php

class VoteController extends BaseController{
    public function voteQuestion($qid){
        $vote   =   new Vote;

        $vote->user_id      =   Auth::user()->user_id;
        $vote->question_id  =   $qid;
        $vote->vote         =   1;
        $vote->save();

        return  Redirect::route('single-question', $qid)
                ->with('global', 'Your Successfully vote up this question');
    }

    public function voteDownQuestion($qid){

        $vote   =   new Vote;

        $vote->user_id      =   Auth::user()->user_id;
        $vote->question_id  =   $qid;
        $vote->vote         =   0;
        $vote->save();

        return  Redirect::route('single-question', $qid)
                ->with('global', 'Your Successfully vote down this question');
    }
}