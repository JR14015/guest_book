<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReCaptchataTestFormRequest;
use App\GuestBook;
use DB;


class ContactController extends Controller
{
   public function getdata()
    {
		$data['data'] = DB::table('guest_books')->orderBy('ID','desc')->paginate(10);

				return view('contact', $data);

	}




public function show($id)
{
		$guestbook = Guest_books::findOrFail($id);			
		return $guestbook;
	}
	public function store(ReCaptchataTestFormRequest $req){
        $name = $req->input('name');
	$email = $req->input('email');
	$web = $req->input('web');
	$comment = $req->input('comment');
	$ip = $_SERVER['REMOTE_ADDR'];
	$browser = $_SERVER['HTTP_USER_AGENT'];
	$created_at = new \DateTime();

	$data = array('name'=>$name,
				  'email'=>$email,
				  'web'=>$web,
				  'comment'=>$comment,
				  'ip'=>$ip,
				  'browser'=>$browser,
				  'created_at'=>$created_at);
	DB::table('guest_books')->insert($data);

		$data['data'] = DB::table('guest_books')->orderBy('ID','desc')->paginate(10);

				return view('contact', $data);	

				
}


}