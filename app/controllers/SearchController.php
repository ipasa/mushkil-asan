<?php

class SearchController extends BaseController{

    public function getSearch(){
        return  View::make('search.search')
                ->with('title', 'Search a Question');
    }

    public function results($keyword){
        return  View::make('search.results')
                ->with('title', 'Search Results')
                ->with('questions', Question::search($keyword)
        );
    }

    public function postSearch(){
        $keyword    =   Input::get('search');
        if(empty($keyword)){
            return  Redirect::route('search-item')
                    ->with('global', 'No keyword Entered to Serach');
        }
        return Redirect::to('results/'.$keyword);
    }
}