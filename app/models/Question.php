<?php

class Question extends Eloquent{
    protected $fillable = array('user_id', 'question');

    public function user(){
        return $this->belongsTo('User');
    }
}

