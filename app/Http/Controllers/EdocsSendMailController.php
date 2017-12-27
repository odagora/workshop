<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EdocsPdfController;
use App\Repositories\EdocsPdfRepository;
use App\Mail\EdocSent;
use App\Make;
use App\Type;
use App\Edocs;
use Mail;
use Session;

class EdocsSendMailController extends Controller
{
    use EdocsPdfRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function edocSendMail($id)
    {
    	$edoc = Edocs::find($id);
        $make = Make::find($edoc->make);
        $type = Type::find($edoc->type);
        $subject = 'Peritaje de'.' '.$make->name.' '.$type->name.' '.'Placas'.' '.$edoc->license;
        $content = [
            'client'=> $edoc->c_firstname.' '.$edoc->c_lastname,
    		'title'=> 'Peritaje de Vehículo Usado No. '.$edoc->id, 
    		'body'=> 'Adjunto se encuentra el informe de peritaje hecho al vehículo'. ' '. $make->name.' '. $type->name.' '.'de placas'.' '. $edoc->license.'.'.' '. 'Ten presente las observaciones dadas. Si deseas cotizar los trabajos relacionados, puedes hacerlo en el siguiente link:',
    		'button' => 'Cotizar Ahora',
            'social'=> 'No olvides seguirnos en nuestras redes sociales:'
    		];
    	$receiverAddress = $edoc->email;
        $date = date('dmY', strtotime($edoc->created_at));
        $attachment = storage_path().'/static/'.$edoc->id.'_'.$edoc->license.'_'.$date.'.pdf';

        $filename = $edoc->id.'_'.$edoc->license.'_'.$date.'.pdf';
        $path = storage_path('static/'.$filename);
        
        //If file doesn't exist in static folder run PdfRepository trait
        if(!file_exists($attachment)){
            //Save file to storage folder
            $this->printEdocsPdf($id)->save($path, true);
        }
        
        //Check if document is not cancelled
        if($edoc->status == 'ok'){
            Mail::to($receiverAddress)->send(new EdocSent($subject, $content, $attachment));

            //Display a flash message on succesfull submit
            Session::flash('success', 'El informe de peritaje de vehículo usado No.'.' '.$edoc->id.' '.'fue enviado de forma exitosa');

            //Redirect to current page
            return redirect()->back();
        }
        else{
            Session::flash('danger', 'El informe de peritaje de vehículo usado No.'.' '.$edoc->id.' '.'está cancelado y no puede ser enviado');

            //Redirect to current page
            return redirect()->back();
        } 
    }
}
