<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\QdocSent;
use Mail;
use App\Qdocs;

class SendMailController extends Controller
{
    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function qdocSendMail($id)
    {
    	$qdoc = Qdocs::find($id);
    	$content = [
    		'title'=> 'Certificado de control calidad No. '.$qdoc->id, 
    		'body'=> 'The body of your message.',
    		'button' => 'Click Here'
    		];

    	$receiverAddress = 'example@example.com';

    	Mail::to($receiverAddress)->send(new QdocSent($content));

    	dd('mail send successfully');
    }
}
