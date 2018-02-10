<?php

namespace App\Http\Controllers;

// use App\Mail\ContactMail;
use Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

	public function getMessage()
	{
		return view('pages.contact');
	}

	public function postMessage(ContactRequest $request)
	{
		$text = "\nNouveau mail le " .date("d-m-Y") ." :\nDe : " .$request->get('name')."\nMail : ".$request->get('email')."\n".$request->get('texte')."\n";
		Storage::append(storage_path('logs\mails.log'), $text);

		// TODO + text
		
		Mail::send('mails.contact', $request->input(), function ($message) {
			$message->to('alexdrak1@hotmail.fr');
			// $message->subject('Nouveau contact sur votre site');				
			$message->subject('Contact - ' . $request->get('name') . ' vous a contacté');				
		});


		$request->session()->flash('fbContact', 'Envoi réussi !');
		
		return view('pages/contact');
	}



}
