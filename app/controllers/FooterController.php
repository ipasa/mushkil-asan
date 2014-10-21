<?php

class FooterController extends BaseController{
    public function aboutus(){
        return  View::make('footerstatic/aboutus')
            ->with('title', 'Welcome to the Muskil - Asan');
    }

    public function rules(){
        return  View::make('footerstatic/rules')
            ->with('title', 'Welcome to the Muskil - Asan');
    }

    public function creator(){
        return  View::make('footerstatic/creator')
            ->with('title', 'Welcome to the Muskil - Asan');
    }
}