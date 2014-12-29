<?php

class Question extends Eloquent{
    protected $fillable = array('user_id','questiontitle', 'question');

    public function user(){
        return $this->belongsTo('User');
    }

    public function answers(){
        return $this->hasMany('Answer');
    }

    public function votes(){
        return $this->hasMany('Vote');
    }

    public static function unsolved(){
        return static::where('solved', '=', 0)
            ->orderBy('id', 'DESC')
            ->paginate(3);
    }
    public static function solved(){
        return static::where('solved', '=', 1)
            ->orderBy('id', 'DESC')
            ->paginate(3);
    }
    public static function topview(){
        return static::where('solved', '=', 0)
            ->orderBy('numsofview', 'DESC')
            ->paginate(3);
    }

    public static function yourQusetion(){
        return static::where('user_id', '=', Auth::user()->user_id)->paginate(2);
    }

    public static function UserQusetion($id){
        return static::where('user_id', '=', $id)->paginate(4);
    }

    public static function search($keyword){
        return  static::where('question', 'LIKE', '%'.$keyword.'%')
                ->paginate(3);
        
    }

    public static function userQuestionCount($uid){
        $qCount =   Question::where('user_id', '=', $uid);
        return $qCount->count();
    }
}

