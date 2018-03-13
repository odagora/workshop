<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Cdocs;
use App\Cphotos;
use Session;

class CdocsPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $doc_id = $request->route('cdoc');
        return view('cdocs.photo.create', compact('doc_id'));
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
     * @param  int  $id $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id, $photo)
    {
        $cdocs = Cdocs::find($id);
        $doc = $cdocs->doc_number + 762;
        $cphoto = Cphotos::find($photo);

        return view('cdocs.photo.show', compact('doc', 'cphoto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id $photo
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
     * @param  int  $id $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $photo)
    {
        $cdocs = Cdocs::find($id);
        $doc = $cdocs->doc_number + 762;
        $cphoto = Cphotos::find($photo);
        $photo = $cphoto->id;
        $photo_url = $cphoto->image_url;

        //Delete information from database
        $cphoto->delete();

        //Delete image from cloudinary
        $seg_url = explode('/', parse_url($photo_url, PHP_URL_PATH));
        $public_id = $seg_url[5];
        $public_id = strstr($public_id, '.', true);

        Cloudder::destroyImage($public_id);

        //Show success delete flash message
        Session::flash('success', 'La foto No.'.' '.$photo.' '.'que pertenece a la cotización No.'.' '.$doc.' fue eliminada de forma exitosa');

        return redirect()->route('cdocs.photo', ['cdoc'=> $cdocs->id]);
    }

    public function getCdocsPhotos($id)
    {
        $cdocs = Cdocs::find($id);
        $doc = $cdocs->doc_number + 762;
        $cphotos = Cphotos::whereDocId($id)->get();
        return view ('cdocs.photo.index' ,compact('cdocs', 'doc', 'cphotos'));
    }
}
