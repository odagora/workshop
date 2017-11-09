<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Qdocs;
use Session;

class QdocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qdocs = Qdocs::all();
        return view('qdocs.index')->withQdocs($qdocs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makes = Make::all();
        $names = Config::get('constants.qdoc_names');
        $items = Config::get('constants.qdoc_items');
        $cats = Config::get('constants.qdoc_cats');
        $elements = Config::get('constants.qdoc_elements');
        $comments = Config::get('constants.qdoc_comments');
        return view('qdocs.create', compact('makes', 'names', 'items', 'cats', 'elements', 'comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data - general information
        $data = array(
            'ordernumber' => 'required|integer|unique:qdocs',
            'e_firstname' => 'required|max:32|alpha',
            'e_lastname' => 'required|max:32|alpha',
            'c_firstname' => 'required|max:32|alpha',
            'c_lastname' => 'required|max:32|alpha',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'make' => 'required',
            'type' => 'required|not_in:0',
            'model' => 'required|max:10|digits:4',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'comment1' => 'max:500',
            'comment2' => 'max:500',
            'comment3' => 'max:500',
            'comment4' => 'max:500',
            'n_mileage' => 'required|numeric|greater_than:mileage',
            'e_signature' => 'required'
        );

         //Validate the data - matrix information
        $names = Config::get('constants.qdoc_names');
        $elements = Config::get('constants.qdoc_elements');
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $data["$name"] = 'required';            
            }
        }

        $this->validate($request, $data);

        //Store in the database - general information
        $qdocs = new Qdocs;

        $qdocs->ordernumber = $request->ordernumber;
        $qdocs->e_firstname = $request->e_firstname;
        $qdocs->e_lastname = $request->e_lastname;
        $qdocs->c_firstname = $request->c_firstname;
        $qdocs->c_lastname = $request->c_lastname;
        $qdocs->email = $request->email;
        $qdocs->phone = $request->phone;
        $qdocs->make = $request->make;
        $qdocs->type = $request->type;
        $qdocs->model = $request->model;
        $qdocs->license = $request->license;
        $qdocs->mileage = $request->mileage;
        $qdocs->comment1 = $request->comment1;
        $qdocs->comment2 = $request->comment2;
        $qdocs->comment3 = $request->comment3;
        $qdocs->comment4 = $request->comment4;
        $qdocs->n_mileage = $request->n_mileage;
        $qdocs->e_signature = $request->e_signature;
        $qdocs->c_signature = $request->c_signature;

        //Store in the database - matrix information
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $qdocs->$name = $request->$name;            
            }
        }

        $qdocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El documento fue creado de forma exitosa');

        //Redirect to another page
        return redirect()->route('qdocs.show', $qdocs->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qdoc = Qdocs::find($id);
        $make = Make::find($qdoc->make);
        $type = Type::find($qdoc->type);
        $names = Config::get('constants.qdoc_names');
        $items = Config::get('constants.qdoc_items');
        $cats = Config::get('constants.qdoc_cats');
        $elements = Config::get('constants.qdoc_elements');
        $comments = Config::get('constants.qdoc_comments');
        return view('qdocs.show', compact('qdoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments'));
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
    public function destroy($id)
    {
        //
    }

}
