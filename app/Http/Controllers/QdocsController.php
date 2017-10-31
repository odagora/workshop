<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Make;
use App\Type;
use App\Qdocs;
use Session;

/*Include php file with matrix names and radio button elements*/
include(storage_path().'/php/q_lists.php');
include(storage_path().'/php/q_elements.php');

class QdocsController extends Controller
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
    public function create()
    {
        return view('qdocs.create');
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
        $names = matrixNames();
        $method = 'getMatrix';
        $arg = 'Elements';
        foreach ($names as $key => $value) {
            $matrix[$key] = call_user_func($method.$key.$arg);
            foreach ($matrix[$key] as $mat => $name) {
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

        //Store in the database - matrix information
        foreach ($names as $key => $value) {
            $matrix[$key] = call_user_func($method.$key.$arg);
            foreach ($matrix[$key] as $mat => $name) {
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
        return view('qdocs.show', compact('qdoc', 'make', 'type'));
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
