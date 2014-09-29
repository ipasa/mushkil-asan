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
}

