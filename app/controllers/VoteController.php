<?php

class VoteController extends BaseController{

    public function voteQuestion($qid){

        $dbCheck    =   Vote::where('user_id','=',Auth::user()->user_id)->where('question_id', '=', $qid)->first();
        if($dbCheck){
            return  Redirect::route('single-question', $qid)
                ->with('global', 'Sorry, you Previously vote this question');
        }
        else{
            $vote   =   new Vote;
            $vote->user_id      =   Auth::user()->user_id;
            $vote->question_id  =   $qid;
            $vote->vote         =   1;
            $vote->save();

            /*Insert point to the Vote user*/
            $insertPoint                    =   User::find(Auth::user()->user_id);
            $insertPoint->points            =   $insertPoint->points+2;
            $insertPoint->save();

            /*Insert point to the Question user*/
            $questionuser                   =   Question::where('id', '=', $qid)->first();
            $insertPoint                    =   User::find($questionuser->user_id);
            $insertPoint->points            =   $insertPoint->points+3;
            $insertPoint->save();

            return  Redirect::route('single-question', $qid)
                ->with('global', 'Your Successfully vote up this question');
        }
    }

    public function voteDownQuestion($qid){
        $dbCheck    =   Vote::where('user_id','=',Auth::user()->user_id)->where('question_id', '=', $qid)->first();
        if($dbCheck){
            return  Redirect::route('single-question', $qid)
                ->with('global', 'Sorry, you Previously vote this question');
        }
        else {

            $vote = new Vote;
            $vote->user_id = Auth::user()->user_id;
            $vote->question_id = $qid;
            $vote->vote = 0;
            $vote->save();

            /*Insert point to the Vote user*/
            $insertPoint                    =   User::find(Auth::user()->user_id);
            $insertPoint->points            =   $insertPoint->points-1;
            $insertPoint->save();

            /*Insert point to the Question user*/
            $questionuser                   =   Question::where('id', '=', $qid)->first();
            $insertPoint                    =   User::find($questionuser->user_id);
            $insertPoint->points            =   $insertPoint->points-2;
            $insertPoint->save();

            return Redirect::route('single-question', $qid)
                ->with('global', 'Your Successfully vote down this question');
        }
    }
}