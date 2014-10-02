<?php

class Answer extends Eloquent{
    protected $fillable = array('answer', 'user_id', 'id');

    public static $rules = array(
        'answer'    =>   'required|min:2|max:255'
    );

    public function user(){
        return $this->belongsTo('User');
    }

    public function question(){
        return $this->belongsTo('Question');
    }
}