<?php

namespace App\Http\Controllers;

use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\Otphotos;
use Session;

class OTdocsImageUploadController extends Controller
{
    public function otdocuploadImages(Request $request, $doc_id)
    {
    	$this->validate($request,[
           'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
       ]);

      $image_name = $request->file('image_name')->getRealPath();;

      Cloudder::upload($image_name, null);

      // list($width, $height) = getimagesize($image_name);

      $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => 200, "height" => 200]);

      //Save images
      $this->saveImages($request, $doc_id, $image_url);

      return redirect()->back()->with('status', 'Foto subida de forma exitosa');
    }

    public function saveImages(Request $request, $doc_id, $image_url)
    {
    	$image = new Otphotos();
    	$image->doc_id = $doc_id;
      	$image->doc_number = Otphotos::count() + 1;
    	$image->image_name = $request->file('image_name')->getClientOriginalName();
    	$image->image_url = $image_url;

    	$image->save();
    }
}
