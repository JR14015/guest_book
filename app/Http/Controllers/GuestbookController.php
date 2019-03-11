<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestBook;


class GuestbookController extends Controller
{    
    public function index()
    {
		return Guest_books::orderBy('created_at','desc')->paginate(10);
	}

public function show($id)
{
		$guestbook = Guest_books::findOrFail($id);			
		return $guestbook;
	}


	public function store(Request $request)
	{
		$this->validate($request, [	'name' => 'required|max:255' ]);
		$this->validate($request, [	'email' => 'required | email' ]);
		$this->validate($request, [	'comment' => 'required' ]);

		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];

		$guestbook = Guest_books::create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'web' => $request->input('web'),
			'comment' => $request->input('comment'),
			'ip' => $ip,
			'browser' => $browser
		]);
			
		return $guestbook;
	}


	public function store2(ReCaptchataTestFormRequest $request){
        //TODO: the rest of the code when form is successful
        return "Done right! :-) ";
}
