<?php

class Vote extends Eloquent{
    public $timestamps  =   false;

    public static function countVote($qid){
        $countUp    =   Vote::where('question_id', '=', $qid)
                        ->where('vote', '=', 1);
        $countUp    =   $countUp->count();

        $countDown  =   Vote::where('question_id', '=', $qid)
                        ->where('vote', '=', 0);
        $countDown  =   $countDown->count();

        if($countUp>$countDown){
            return $myCount =   $countUp;
        }elseif($countUp<$countDown){
            return $myCount =   '- '.$countDown;
        }else{
            return $myCount =   'No Vote Yet';
        }

    }

    /*Count User Votes*/
    public static function userVoteCount($uid){
        $qCount =   Vote::where('user_id', '=', $uid);
        return $qCount->count();
    }
}