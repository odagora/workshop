<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Otdocs;
use App\Otphotos;
use Session;

class OTPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $otdocs = Otdocs::find($id);
        $doc = $otdocs->ordernumber;
        $otphotos = Otphotos::whereDocId($id)->get();
        return view ('otdocs.photo.index', compact('otdocs', 'doc', 'otphotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $doc_id = $request->route('otdoc');
        return view ('otdocs.photo.create', compact('doc_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $photo)
    {
        $otdocs = Otdocs::find($id);
        $doc = $otdocs->ordernumber;
        $otphoto = Otphotos::find($photo);

        return view('otdocs.photo.show', compact('doc', 'otphoto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $photo)
    {
        $otdocs = Otdocs::find($id);
        $doc = $otdocs->ordernumber;
        $otphoto = Otphotos::find($photo);
        $photo = $otphoto->id;
        $photo_url = $otphoto->image_url;

        //Delete information from database
        $otphoto->delete();

        //Delete image from cloudinary
        $seg_url = explode('/', parse_url($photo_url, PHP_URL_PATH));
        $public_id = $seg_url[5];
        $public_id = strstr($public_id, '.', true);

        Cloudder::destroyImage($public_id);

        //Show success delete flash message
        Session::flash('success', 'La foto No.'.' '.$photo.' '.'que pertenece a la orden de reparación No.'.' '.$doc.' fue eliminada de forma exitosa');

        return redirect()->route('otdocs.photo.index', ['otdoc'=> $otdocs->id]);
    }
}
