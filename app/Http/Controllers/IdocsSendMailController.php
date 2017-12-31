<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\IdocsPdfController;
use App\Repositories\IdocsPdfRepository;
use App\Mail\IdocSent;
use App\Make;
use App\Type;
use App\Idocs;
use Mail;
use Session;

class IdocsSendMailController extends Controller
{
    use IdocsPdfRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function idocSendMail($id)
    {
    	$idoc = Idocs::find($id);
        $make = Make::find($idoc->make);
        $type = Type::find($idoc->type);
        $subject = 'Inspección Visual de'.' '.$make->name.' '.$type->name.' '.'Placas'.' '.$idoc->license;
        $content = [
            'client'=> $idoc->c_firstname.' '.$idoc->c_lastname,
    		'title'=> 'Inspección Visual No. '.$idoc->id, 
    		'body'=> 'Adjunto se encuentra el informe de inspección visual hecho al vehículo'. ' '. $make->name.' '. $type->name.' '.'de placas'.' '. $idoc->license.'.'.' '. 'Ten presente las observaciones dadas. Si deseas cotizar los trabajos relacionados, puedes hacerlo en el siguiente link:',
    		'button' => 'Cotizar Ahora',
            'social'=> 'No olvides seguirnos en nuestras redes sociales:'
    		];
    	$receiverAddress = $idoc->email;
        $date = date('dmY', strtotime($idoc->created_at));
        $attachment = storage_path().'/static/'.$idoc->id.'_'.$idoc->license.'_'.$date.'.pdf';

        $filename = $idoc->id.'_'.$idoc->license.'_'.$date.'.pdf';
        $path = storage_path('static/'.$filename);
        
        //If file doesn't exist in static folder run PdfRepository trait
        if(!file_exists($attachment)){
            //Save file to storage folder
            $this->printIdocsPdf($id)->save($path, true);
        }
        
        //Check if document is not cancelled
        if($idoc->status == 'ok'){
            Mail::to($receiverAddress)->send(new IdocSent($subject, $content, $attachment));

            //Display a flash message on succesfull submit
            Session::flash('success', 'El informe de inspección visual No.'.' '.$idoc->id.' '.'fue enviado de forma exitosa');

            //Redirect to current page
            return redirect()->back();
        }
        else{
            Session::flash('danger', 'El informe de inspección visual No.'.' '.$idoc->id.' '.'está cancelado y no puede ser enviado');

            //Redirect to current page
            return redirect()->back();
        } 
    }
}
