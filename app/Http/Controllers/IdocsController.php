<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Idocs;
use Session;

class IdocsController extends Controller
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
           $idocs = Idocs::orderBy('id', 'desc')->paginate(5); 
        }
        else{
           $idocs = Idocs::where('id', 'like', '%'.$search.'%')->orwhere('c_firstname', 'like', '%'.$search.'%')->orwhere('c_lastname', 'like', '%'.$search.'%')->orwhere('license', 'like', '%'.$search.'%')->paginate(5); 
        }

        return view('idocs.index', compact('idocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makes = Make::all();
        $names = Config::get('constants.idoc_names');
        $items = Config::get('constants.idoc_items');
        $cats = Config::get('constants.idoc_cats');
        $elements = Config::get('constants.idoc_elements');
        $comments = Config::get('constants.idoc_comments');
        return view('idocs.create', compact('makes', 'names', 'items', 'cats', 'elements', 'comments'));
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
            'e_firstname' => 'required|max:32|alpha_spaces',
            'e_lastname' => 'required|max:32|alpha_spaces',
            'c_firstname' => 'required|max:32|alpha_spaces',
            'c_lastname' => 'required|max:32|alpha_spaces',
            'id_number' => 'required|numeric',
            'email' => 'required|max:29|email',
            'phone' => 'required|digits_between:7,11|numeric',
            'make' => 'required',
            'type' => 'required|not_in:0',
            'model' => 'required|max:10|digits:4',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'comment1' => 'max:500',
            'comment2' => 'max:500',
            'comment3' => 'max:500',
            'comment4' => 'max:500',
            'comment5' => 'max:500',
            'e_signature' => 'required'
        );

         //Validate the data - matrix information
        $names = Config::get('constants.idoc_names');
        $elements = Config::get('constants.idoc_elements');
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $data["$name"] = 'required';            
            }
        }

        $this->validate($request, $data);

        //Store in the database - general information
        $idocs = new Idocs;

        $idocs->e_firstname = ucwords(strtolower($request->e_firstname));
        $idocs->e_lastname = ucwords(strtolower($request->e_lastname));
        $idocs->c_firstname = ucwords(strtolower($request->c_firstname));
        $idocs->c_lastname = ucwords(strtolower($request->c_lastname));
        $idocs->id_number = $request->id_number;
        $idocs->email = strtolower($request->email);
        $idocs->phone = $request->phone;
        $idocs->make = $request->make;
        $idocs->type = $request->type;
        $idocs->model = $request->model;
        $idocs->license = $request->license;
        $idocs->mileage = $request->mileage;
        $idocs->comment1 = $request->comment1;
        $idocs->comment2 = $request->comment2;
        $idocs->comment3 = $request->comment3;
        $idocs->comment4 = $request->comment4;
        $idocs->comment5 = $request->comment5;
        $idocs->e_signature = $request->e_signature;

        //Store in the database - matrix information
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $idocs->$name = $request->$name;            
            }
        }

        //Store status on submit
        $idocs->status = 'ok';

        //Store column position in DB
        $idocs->doc_number = Idocs::count() + 1;

        $idocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El documento fue creado de forma exitosa');

        //Redirect to another page
        return redirect()->route('idocs.show', $idocs->id);
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
        $idoc = Idocs::find($id);
        $make = Make::find($idoc->make);
        $type = Type::find($idoc->type);
        $names = Config::get('constants.idoc_names');
        $items = Config::get('constants.idoc_items');
        $cats = Config::get('constants.idoc_cats');
        $elements = Config::get('constants.idoc_elements');
        $comments = Config::get('constants.idoc_comments');
        $doc = $idoc->doc_number + 3012;
        return view('idocs.show', compact('idoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments','doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idoc = Idocs::find($id);
        $make_id = Make::find($idoc->make);
        $type = Type::find($idoc->type);
        $makes = Make::all();
        $names = Config::get('constants.idoc_names');
        $items = Config::get('constants.idoc_items');
        $cats = Config::get('constants.idoc_cats');
        $elements = Config::get('constants.idoc_elements');
        $comments = Config::get('constants.idoc_comments');
        $doc = $idoc->doc_number + 3012;

        //Check if document is not cancelled
        if ($idoc->status == 'ok') {
            return view('idocs.edit', compact('idoc', 'make_id', 'type', 'makes', 'names', 'items', 'cats', 'elements', 'comments','doc'));
        }
        else{
           Session::flash('warning', 'El informe de inspección visual No.'.' '.$doc.' '.' no se puede editar ya que se encuentra cancelado');

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
        $idocs = Idocs::find($id);
        $doc = $idocs->doc_number + 3012;

        //Validate the data - general information
        $data = array(
            'e_firstname' => 'required|max:32|alpha_spaces',
            'e_lastname' => 'required|max:32|alpha_spaces',
            'c_firstname' => 'required|max:32|alpha_spaces',
            'c_lastname' => 'required|max:32|alpha_spaces',
            'id_number' => 'required|numeric',
            'email' => 'required|max:29|email',
            'phone' => 'required|digits_between:7,11|numeric',
            'make' => 'required',
            'type' => 'required|not_in:0',
            'model' => 'required|max:10|digits:4',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'comment1' => 'max:500',
            'comment2' => 'max:500',
            'comment3' => 'max:500',
            'comment4' => 'max:500',
            'comment5' => 'max:500',
            'e_signature' => 'required'
        );

        //Validate the data - matrix information
        $names = Config::get('constants.idoc_names');
        $elements = Config::get('constants.idoc_elements');
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $data["$name"] = 'required';            
            }
        }

        $this->validate($request, $data);

        //Save the data to the database - general information

        $idocs->e_firstname = ucwords(strtolower($request->input('e_firstname')));
        $idocs->e_lastname = ucwords(strtolower($request->input('e_lastname')));
        $idocs->c_firstname = ucwords(strtolower($request->input('c_firstname')));
        $idocs->c_lastname = ucwords(strtolower($request->input('c_lastname')));
        $idocs->id_number = $request->input('id_number');
        $idocs->email = strtolower($request->input('email'));
        $idocs->phone = $request->input('phone');
        $idocs->make = $request->input('make');
        $idocs->type = $request->input('type');
        $idocs->model = $request->input('model');
        $idocs->license = $request->input('license');
        $idocs->mileage = $request->input('mileage');
        $idocs->comment1 = $request->input('comment1');
        $idocs->comment2 = $request->input('comment2');
        $idocs->comment3 = $request->input('comment3');
        $idocs->comment4 = $request->input('comment4');
        $idocs->comment5 = $request->input('comment5');
        $idocs->e_signature = $request->input('e_signature');

        //Store in the database - matrix information
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $idocs->$name = $request->input($name);            
            }
        }

        $idocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El informe de inspección visual No.'.' '.$doc.' '.'fue modificado de forma exitosa');

        //Redirect to another page
        return redirect()->route('idocs.show', $idocs->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idocs = Idocs::find($id);
        $doc = $idocs->doc_number + 3012;
        $idocs->delete();

        Session::flash('success', 'El informe de inspección visual No.'.' '.$doc.' '.' fue eliminado de forma exitosa');

        return redirect()->route('idocs.index');
    }

    /**
     * Cancel the specified resource from storage
     *
     * @param  int $id
     * @return  \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $idocs = Idocs::find($id);
        $doc = $idocs->doc_number + 3012;

        //Check for resource status
        if ($idocs->status == 'cancelled') {
            Session::flash('warning', 'El informe de inspección visual No.'.' '.$doc.' '.'ya se encuentra cancelado');

            return redirect()->back();
        }
        else {
            $idocs->status = 'cancelled';

            $idocs->save();

            Session::flash('success', 'El informe de inspección visual No.'.' '.$doc.' '.'fue cancelado de forma exitosa');

            return redirect()->back();
        }
    }
}
