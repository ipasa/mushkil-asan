<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return  View::make('hello')
                ->with('title', 'Welcome to the Muskil - Asan')
                ->with('questions', Question::unsolved())
                ->with('showing', "Unsolved");
	}

    public function showWelcomeSolved()
    {
        return  View::make('hello')
            ->with('title', 'Welcome to the Muskil - Asan')
            ->with('questions', Question::solved())
            ->with('showing', "Solved");
    }
    public function showWelcomeTopview()
    {
        return  View::make('hello')
            ->with('title', 'Welcome to the Muskil - Asan')
            ->with('questions', Question::topview())
            ->with('showing', "Top-View");
    }


}
