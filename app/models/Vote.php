<?php

class Vote extends Eloquent{
    public $timestamps  =   false;

    public static function countVote($qid){
        $count  =   Vote::where('question_id', '=', $qid);
        return $myCount =   $count->count();
    }

    /*Count User Votes*/
    public static function userVoteCount($uid){
        $qCount =   Vote::where('user_id', '=', $uid);
        return $qCount->count();
    }
}