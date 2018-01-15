<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\QdocsPdfController;
use App\Repositories\QdocsPdfRepository;
use Illuminate\Support\Facades\Config;
use App\Mail\QdocSent;
use App\Make;
use App\Type;
use App\Qdocs;
use Mail;
use Session;

class QdocsSendMailController extends Controller
{
    
    use QdocsPdfRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function qdocSendMail($id)
    {
    	$qdoc = Qdocs::find($id);
        $make = Make::find($qdoc->make);
        $type = Type::find($qdoc->type);
        $subject = 'Certificado Control Calidad'.' '.$make->name.' '.$type->name.' '.'Placas'.' '.$qdoc->license;
        $content = [
            'client'=> $qdoc->c_firstname.' '.$qdoc->c_lastname,
    		'title'=> 'Certificado de control calidad No. '.$qdoc->id, 
    		'body'=> 'Adjunto se encuentra el certificado de control calidad de la reparación hecha al vehículo'. ' '. $make->name.' '. $type->name.' '.'de placas'.' '. $qdoc->license.'.'.' '. 'Ten presente las observaciones dadas. Recuerda revisar la política de garantía en el siguiente vínculo:',
    		'button' => 'Ver Política',
            'social'=> 'No olvides seguirnos en nuestras redes sociales:'
    		];
    	$receiverAddress = $qdoc->email;
        $bccAddress = Config::get('emailadresses.bcc');
        $date = date('dmY', strtotime($qdoc->created_at));
        $doc = $qdoc->doc_number + 1115;
        $attachment = storage_path().'/app/'.$doc.'_'.$qdoc->license.'_'.$date.'.pdf';

        $filename = $doc.'_'.$qdoc->license.'_'.$date.'.pdf';
        $path = storage_path('app/'.$filename);
        
        //If file doesn't exist in static folder run PdfRepository trait
        if(!file_exists($attachment)){
            //Save file to storage folder
            $this->printQdocsPdf($id)->save($path, true);
        }
        
        //Check if document is not cancelled
        if($qdoc->status == 'ok'){
            Mail::to($receiverAddress)->bcc($bccAddress)->send(new QdocSent($subject, $content, $attachment));

            //Display a flash message on succesfull submit
            Session::flash('success', 'El certificado de control calidad No.'.' '.$doc.' '.'fue enviado de forma exitosa');

            //Redirect to current page
            return redirect()->back();
        }
        else{
            Session::flash('danger', 'El certificado de control calidad No.'.' '.$doc.' '.'está cancelado y no puede ser enviado');

            //Redirect to current page
            return redirect()->back();
        } 
    }
}
