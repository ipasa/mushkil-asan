<?php

class Question extends Eloquent{
    protected $fillable = array('user_id','questiontitle', 'question');

    public function user(){
        return $this->belongsTo('User');
    }

    public static function unsolved(){
        return static::where('solved', '=', 0)
            ->orderBy('id', 'DESC')
            ->paginate(3);
    }

    public static function yourQusetion(){
        return static::where('user_id', '=', Auth::user()->user_id)->paginate(2);
    }

    public static function UserQusetion($id){
        return static::where('user_id', '=', $id)->paginate(4);
    }
}
