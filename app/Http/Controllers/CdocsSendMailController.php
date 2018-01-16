<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CdocsPdfController;
use App\Repositories\CdocsPdfRepository;
use Illuminate\Support\Facades\Config;
use App\Mail\CdocSent;
use App\Make;
use App\Type;
use App\Cdocs;
use Mail;
use Session;

class CdocsSendMailController extends Controller
{
    use CdocsPdfRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function cdocSendMail($id)
    {
    	$cdoc = Cdocs::find($id);
        $make = Make::find($cdoc->make);
        $type = Type::find($cdoc->type);
        $subject = 'Cotización de'.' '.$make->name.' '.$type->name.' '.'Placas'.' '.$cdoc->license;
        $content = [
            'client'=> $cdoc->c_firstname.' '.$cdoc->c_lastname,
    		'title'=> 'Cotización de colisión exprés No. '.$cdoc->id, 
    		'body'=> 'Adjunto se encuentra la cotización hecha al vehículo'. ' '. $make->name.' '. $type->name.' '.'de placas'.' '. $cdoc->license.'.'.' '. 'Si estás interesado en realizar los trabajos, puedes agendar una cita por teléfono o haciendo click en el siguiente link:',
    		'button' => 'Agendar cita',
            'social'=> 'No olvides seguirnos en nuestras redes sociales:'
    		];
    	$receiverAddress = $cdoc->email;
        $bccAddress = Config::get('emailadresses.bcc');
        $date = date('dmY', strtotime($cdoc->created_at));
        $doc = $cdoc->doc_number + 762;
        $attachment = storage_path().'/app/'.$doc.'_'.$cdoc->license.'_'.$date.'.pdf';

        $filename = $doc.'_'.$cdoc->license.'_'.$date.'.pdf';
        $path = storage_path('app/'.$filename);
        
        //If file doesn't exist in static folder run PdfRepository trait
        if(!file_exists($attachment)){
            //Save file to storage folder
            $this->printCdocsPdf($id)->save($path, true);
        }
        
        //Check if document is not cancelled
        if($cdoc->status == 'ok'){
            Mail::to($receiverAddress)->bcc($bccAddress)->send(new CdocSent($subject, $content, $attachment));

            //Display a flash message on succesfull submit
            Session::flash('success', 'La cotización de colisión exprés No.'.' '.$doc.' '.'fue enviada de forma exitosa');

            //Redirect to current page
            return redirect()->back();
        }
        else{
            Session::flash('danger', 'La cotización de colisión exprés No.'.' '.$doc.' '.'está cancelada y no puede ser enviada');

            //Redirect to current page
            return redirect()->back();
        } 
    }
}
