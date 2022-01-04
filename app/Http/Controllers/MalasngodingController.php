<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\MalasngodingEmail;
use Illuminate\Support\Facades\Mail;

class MalasngodingController extends Controller
{
	public function index(){

		Mail::to("ardisetiawan1305@gmail.com")->send(new MalasngodingEmail());

		return "Email telah dikirim";

	}

}
