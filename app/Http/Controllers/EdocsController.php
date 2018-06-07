<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Edocs;
use Session;

class EdocsController extends Controller
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
           $edocs = Edocs::orderBy('id', 'desc')->paginate(5); 
        }
        else{
           $edocs = Edocs::where('id', 'like', '%'.$search.'%')->orwhere('c_firstname', 'like', '%'.$search.'%')->orwhere('c_lastname', 'like', '%'.$search.'%')->orwhere('license', 'like', '%'.$search.'%')->paginate(5); 
        }

        return view('edocs.index', compact('edocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makes = Make::all();
        $names = Config::get('constants.edoc_names');
        $items = Config::get('constants.edoc_items');
        $cats = Config::get('constants.edoc_cats');
        $elements = Config::get('constants.edoc_elements');
        $comments = Config::get('constants.edoc_comments');
        return view('edocs.create', compact('makes', 'names', 'items', 'cats', 'elements', 'comments'));
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
            'e_firstname' => 'required|max:17|alpha_spaces',
            'e_lastname' => 'required|max:13|alpha_spaces',
            'c_firstname' => 'required|max:17|alpha_spaces',
            'c_lastname' => 'required|max:13|alpha_spaces',
            'id_number' => 'required|numeric',
            'email' => 'required|max:26|email',
            'phone' => 'required|digits_between:7,10|numeric',
            'make' => 'required',
            'type' => 'required|not_in:0',
            'model' => 'required|max:10|digits:4',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'comment1' => 'max:400',
            'comment2' => 'max:400',
            'comment3' => 'max:400',
            'comment4' => 'max:400',
            'comment5' => 'max:400',
            'comment6' => 'max:400',
            'comment7' => 'max:400',
            'comment8' => 'max:400',
            'e_signature' => 'required'
        );

         //Validate the data - matrix information
        $names = Config::get('constants.edoc_names');
        $elements = Config::get('constants.edoc_elements');
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $data["$name"] = 'required';            
            }
        }

        $this->validate($request, $data);

        //Store in the database - general information
        $edocs = new Edocs;

        $edocs->e_firstname = ucwords(strtolower($request->e_firstname));
        $edocs->e_lastname = ucwords(strtolower($request->e_lastname));
        $edocs->c_firstname = ucwords(strtolower($request->c_firstname));
        $edocs->c_lastname = ucwords(strtolower($request->c_lastname));
        $edocs->id_number = $request->id_number;
        $edocs->email = strtolower($request->email);
        $edocs->phone = $request->phone;
        $edocs->make = $request->make;
        $edocs->type = $request->type;
        $edocs->model = $request->model;
        $edocs->license = $request->license;
        $edocs->mileage = $request->mileage;
        $edocs->comment1 = $request->comment1;
        $edocs->comment2 = $request->comment2;
        $edocs->comment3 = $request->comment3;
        $edocs->comment4 = $request->comment4;
        $edocs->comment5 = $request->comment5;
        $edocs->comment6 = $request->comment6;
        $edocs->comment7 = $request->comment7;
        $edocs->comment8 = $request->comment8;
        $edocs->e_signature = $request->e_signature;
        $edocs->c_signature = $request->c_signature;

        //Store in the database - matrix information
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $edocs->$name = $request->$name;            
            }
        }

        //Store status on submit
        $edocs->status = 'ok';

        //Store column position in DB
        $edocs->doc_number = Edocs::count() + 1;

        $edocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El documento fue creado de forma exitosa');

        //Redirect to another page
        return redirect()->route('edocs.show', $edocs->id);
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
        $edoc = Edocs::find($id);
        $make = Make::find($edoc->make);
        $type = Type::find($edoc->type);
        $names = Config::get('constants.edoc_names');
        $items = Config::get('constants.edoc_items');
        $cats = Config::get('constants.edoc_cats');
        $elements = Config::get('constants.edoc_elements');
        $comments = Config::get('constants.edoc_comments');
        $doc = $edoc->doc_number + 2024;
        return view('edocs.show', compact('edoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments','doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edoc = Edocs::find($id);
        $make_id = Make::find($edoc->make);
        $type = Type::find($edoc->type);
        $makes = Make::all();
        $names = Config::get('constants.edoc_names');
        $items = Config::get('constants.edoc_items');
        $cats = Config::get('constants.edoc_cats');
        $elements = Config::get('constants.edoc_elements');
        $comments = Config::get('constants.edoc_comments');
        $doc = $edoc->doc_number + 2024;

        //Check if document is not cancelled
        if ($edoc->status == 'ok') {
            return view('edocs.edit', compact('edoc', 'make_id', 'type', 'makes', 'names', 'items', 'cats', 'elements', 'comments','doc'));
        }
        else{
           Session::flash('warning', 'El informe de peritaje No.'.' '.$doc.' '.' no se puede editar ya que se encuentra cancelado');

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
        $edocs = Edocs::find($id);
        $doc = $edocs->doc_number + 2024;

        //Validate the data - general information
        $data = array(
            'e_firstname' => 'required|max:17|alpha_spaces',
            'e_lastname' => 'required|max:13|alpha_spaces',
            'c_firstname' => 'required|max:17|alpha_spaces',
            'c_lastname' => 'required|max:13|alpha_spaces',
            'id_number' => 'required|numeric',
            'email' => 'required|max:26|email',
            'phone' => 'required|digits_between:7,10|numeric',
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
            'comment6' => 'max:500',
            'comment7' => 'max:500',
            'comment8' => 'max:500',
            'e_signature' => 'required'
        );

        //Validate the data - matrix information
        $names = Config::get('constants.edoc_names');
        $elements = Config::get('constants.edoc_elements');
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $data["$name"] = 'required';            
            }
        }

        $this->validate($request, $data);

        //Save the data to the database - general information

        $edocs->e_firstname = ucwords(strtolower($request->input('e_firstname')));
        $edocs->e_lastname = ucwords(strtolower($request->input('e_lastname')));
        $edocs->c_firstname = ucwords(strtolower($request->input('c_firstname')));
        $edocs->c_lastname = ucwords(strtolower($request->input('c_lastname')));
        $edocs->id_number = $request->input('id_number');
        $edocs->email = strtolower($request->input('email'));
        $edocs->phone = $request->input('phone');
        $edocs->make = $request->input('make');
        $edocs->type = $request->input('type');
        $edocs->model = $request->input('model');
        $edocs->license = $request->input('license');
        $edocs->mileage = $request->input('mileage');
        $edocs->comment1 = $request->input('comment1');
        $edocs->comment2 = $request->input('comment2');
        $edocs->comment3 = $request->input('comment3');
        $edocs->comment4 = $request->input('comment4');
        $edocs->comment5 = $request->input('comment5');
        $edocs->comment6 = $request->input('comment6');
        $edocs->comment7 = $request->input('comment7');
        $edocs->comment8 = $request->input('comment8');
        $edocs->e_signature = $request->input('e_signature');
        $edocs->c_signature = $request->input('c_signature');

        //Store in the database - matrix information
        foreach ($names as $key => $value) {
            foreach ($elements[$key] as $mat => $name) {
                $edocs->$name = $request->input($name);            
            }
        }

        $edocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El informe de peritaje No.'.' '.$doc.' '.'fue modificado de forma exitosa');

        //Redirect to another page
        return redirect()->route('edocs.show', $edocs->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edocs = Edocs::find($id);
        $doc = $edocs->doc_number + 2024;
        $edocs->delete();

        Session::flash('success', 'El informe de peritaje No.'.' '.$doc.' '.' fue eliminado de forma exitosa');

        return redirect()->route('edocs.index');
    }

    /**
     * Cancel the specified resource from storage
     *
     * @param  int $id
     * @return  \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $edocs = Edocs::find($id);
        $doc = $edocs->doc_number + 2024;

        //Check for resource status
        if ($edocs->status == 'cancelled') {
            Session::flash('warning', 'El informe de peritaje No.'.' '.$doc.' '.'ya se encuentra cancelado');

            return redirect()->back();
        }
        else {
            $edocs->status = 'cancelled';

            $edocs->save();

            Session::flash('success', 'El informe de peritaje No.'.' '.$doc.' '.'fue cancelado de forma exitosa');

            return redirect()->back();
        }
    }
}
