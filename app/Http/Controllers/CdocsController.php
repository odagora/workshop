<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Make;
use App\Type;
use App\Cdocs;
use Session;

class CdocsController extends Controller
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
    public function index()
    {
        $search = \Request::get('search');
        if(is_null($search)){
           $cdocs = Cdocs::orderBy('id', 'desc')->paginate(5); 
        }
        else{
           $cdocs = Cdocs::where('id', 'like', '%'.$search.'%')->orwhere('c_firstname', 'like', '%'.$search.'%')->orwhere('c_lastname', 'like', '%'.$search.'%')->orwhere('license', 'like', '%'.$search.'%')->paginate(5); 
        }

        return view('cdocs.index', compact('cdocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makes = Make::all();
        return view('cdocs.create', compact('makes'));
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
            'e_firstname' => 'required|max:19|alpha_spaces',
            'e_lastname' => 'required|max:10|alpha_spaces',
            'c_firstname' => 'required|max:15|alpha_spaces',
            'c_lastname' => 'required|max:15|alpha_spaces',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'make' => 'required',
            'type' => 'required|not_in:0',
            'model' => 'required|max:10|digits:4',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'description' => 'required|max:288',
            'spare_parts' => 'required|max:3',
            'spare_description' => 'max:88',
            'price' => 'required|integer',
            'time' => 'required|numeric',
            'validity_time' => 'required|numeric',
            'observations' => 'required|max:300'
        );

        $this->validate($request, $data);

        //Store in the database - general information
        $cdocs = new Cdocs;

        $cdocs->e_firstname = $request->e_firstname;
        $cdocs->e_lastname = $request->e_lastname;
        $cdocs->c_firstname = $request->c_firstname;
        $cdocs->c_lastname = $request->c_lastname;
        $cdocs->phone = $request->phone;
        $cdocs->email = $request->email;
        $cdocs->make = $request->make;
        $cdocs->type = $request->type;
        $cdocs->model = $request->model;
        $cdocs->license = $request->license;
        $cdocs->mileage = $request->mileage;
        $cdocs->description = $request->description;
        $cdocs->spare_parts = $request->spare_parts;
        $cdocs->spare_description = $request->spare_description;
        $cdocs->price = $request->price;
        $cdocs->time = $request->time;
        $cdocs->validity_time = $request->validity_time;
        $cdocs->observations = $request->observations;

        //Store status on submit
        $cdocs->status = 'ok';

        //Store column position in DB
        $cdocs->doc_number = Cdocs::count() + 1;

        $cdocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El documento fue creado de forma exitosa');

        //Redirect to another page
        return redirect()->route('cdocs.show', $cdocs->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show all view in blade page
        $cdoc = Cdocs::find($id);
        $make = Make::find($cdoc->make);
        $type = Type::find($cdoc->type);
        $doc = $cdoc->doc_number + 762;
        return view('cdocs.show', compact('cdoc', 'make', 'type', 'doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cdoc = Cdocs::find($id);
        $make_id = Make::find($cdoc->make);
        $type = Type::find($cdoc->type);
        $makes = Make::all();
        $doc = $cdoc->doc_number + 762;

        //Check if document is not cancelled
        if ($cdoc->status == 'ok') {
            return view('cdocs.edit', compact('cdoc', 'make_id', 'type', 'makes', 'doc'));
        }
        else{
           Session::flash('warning', 'La cotización de colisión exprés No.'.' '.$doc.' '.' no se puede editar ya que se encuentra cancelada');

            return redirect()->back(); 
        }
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
        $cdocs = Cdocs::find($id);
        $doc = $cdocs->doc_number + 762;

        //Validate the data - general information
        $data = array(
            'e_firstname' => 'required|max:19|alpha_spaces',
            'e_lastname' => 'required|max:10|alpha_spaces',
            'c_firstname' => 'required|max:15|alpha_spaces',
            'c_lastname' => 'required|max:15|alpha_spaces',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'make' => 'required',
            'type' => 'required|not_in:0',
            'model' => 'required|max:10|digits:4',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'description' => 'required|max:288',
            'spare_parts' => 'required|max:3',
            'spare_description' => 'max:88',
            'price' => 'required|integer',
            'time' => 'required|numeric',
            'validity_time' => 'required|numeric',
            'observations' => 'required|max:300'
        );

        $this->validate($request, $data);

        //Store in the database - general information

        $cdocs->e_firstname = $request->input('e_firstname');
        $cdocs->e_lastname = $request->input('e_lastname');
        $cdocs->c_firstname = $request->input('c_firstname');
        $cdocs->c_lastname = $request->input('c_lastname');
        $cdocs->phone = $request->input('phone');
        $cdocs->email = $request->input('email');
        $cdocs->make = $request->input('make');
        $cdocs->type = $request->input('type');
        $cdocs->model = $request->input('model');
        $cdocs->license = $request->input('license');
        $cdocs->mileage = $request->input('mileage');
        $cdocs->description = $request->input('description');
        $cdocs->spare_parts = $request->input('spare_parts');
        $cdocs->spare_description = $request->input('spare_description');
        $cdocs->price = $request->input('price');
        $cdocs->time = $request->input('time');
        $cdocs->validity_time = $request->input('validity_time');
        $cdocs->observations = $request->input('observations');

        $cdocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'La cotización de colisión exprés No.'.' '.$doc.' '.'fue modificada de forma exitosa');

        //Redirect to another page
        return redirect()->route('cdocs.show', $cdocs->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cdocs = Cdocs::find($id);
        $doc = $cdocs->doc_number + 762;
        $cdocs->delete();

        Session::flash('success', 'La cotización de colisión exprés No.'.' '.$doc.' '.' fue eliminada de forma exitosa');

        return redirect()->route('cdocs.index');
    }

    /**
     * Cancel the specified resource from storage
     *
     * @param  int $id
     * @return  \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $cdocs = Cdocs::find($id);
        $doc = $cdocs->doc_number + 762;

        //Check for resource status
        if ($cdocs->status == 'cancelled') {
            Session::flash('warning', 'La cotización de colisión exprés No.'.' '.$doc.' '.'ya se encuentra cancelada');

            return redirect()->back();
        }
        else {
            $cdocs->status = 'cancelled';

            $cdocs->save();

            Session::flash('success', 'La cotización de colisión exprés No.'.' '.$doc.' '.'fue cancelada de forma exitosa');

            return redirect()->back();
        }
    }
}
