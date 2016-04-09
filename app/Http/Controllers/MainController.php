<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;

use Illuminate\Http\Request;

class MainController extends Controller {

	public function home()
	{
		return view('home.main')
		->with('pagin', 'home');
	}

	public function program()
	{
		return view('home.program')
		->with('pagin', 'program');
	}

	public function schedule()
	{
		return view('home.schedule')
		->with('pagin', 'schedule')
		->with('num', '1');
	}

	public function accomodation()
	{
		return view('home.accomodation')
		->with('pagin', 'accomodation');
	}
	public function gallery()
	{
		return view('home.gallery')
		->with('pagin', 'gallery');
	}
	public function contact()
	{
		return view('home.contact')
		->with('pagin', 'contact');
	}

	public function participants()
	{
		$participants = Member::all();
		return view('home.participants')
		->with('pagin', 'participants')
		->with('participants', $participants);
	}
}
