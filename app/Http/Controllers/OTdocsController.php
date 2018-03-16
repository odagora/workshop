<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Otdocs;
use App\Otphotos;
use App\Otdtc;
use Session;

class OTdocsController extends Controller
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
        if (is_null($search)) {
            $otdocs = Otdocs::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $otdocs = Otdocs::where('id', 'like', '%'.$search.'%')->orwhere('c_firstname', 'like', '%'.$search.'%')->orwhere('c_lastname', 'like', '%'.$search.'%')->orwhere('license', 'like', '%'.$search.'%')->orwhere('ordernumber', 'like', '%'.$search.'%')->paginate(5);
        }

        return view('otdocs.index', compact('otdocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('otdocs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'c_firstname' => 'required|max:32|alpha',
            'c_lastname' => 'required|max:32|alpha',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'ordernumber' => 'required|integer|unique:otdocs'
        ]);

        $otdocs = new Otdocs;

        $otdocs->c_firstname = $request->c_firstname;
        $otdocs->c_lastname = $request->c_lastname;
        $otdocs->license = $request->license;
        $otdocs->mileage = $request->mileage;
        $otdocs->ordernumber = $request->ordernumber;

        //Store status on submit
        $otdocs->status = 'ok';

        //Store column position in DB
        $otdocs->id_number = Otdocs::count() + 1;

        $otdocs->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El documento fue creado de forma exitosa');

        //Redirect to another page
        // return redirect()->route('otdocs.show', $otdocs->id);
        return redirect()->route('otdocs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $otdoc = Otdocs::find($id);
        $doc = $otdoc->ordernumber;
        $otphotos = Otphotos::whereDocId($id)->get();
        $otdtcs = Otdtc::whereDocId($id)->get();
        return view('otdocs.show', compact('otdoc', 'doc', 'otphotos', 'otdtcs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otdoc = Otdocs::find($id);
        $doc = $otdoc->ordernumber;

        return view('otdocs.edit', compact('otdoc', 'doc'));
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
        $otdoc = Otdocs::find($id);
        $doc = $otdoc->ordernumber;

        if($request->input('ordernumber') == $otdoc->ordernumber) {
            $this->validate($request, [
            'c_firstname' => 'required|max:32|alpha',
            'c_lastname' => 'required|max:32|alpha',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric'
            ]);
        }
        else {
            $this->validate($request, [
            'c_firstname' => 'required|max:32|alpha',
            'c_lastname' => 'required|max:32|alpha',
            'license' => 'required|max:6|alpha_num',
            'mileage' => 'required|numeric',
            'ordernumber' => 'required|integer|unique:otdocs'
            ]);
        }

        $otdoc->c_firstname = $request->input('c_firstname');
        $otdoc->c_lastname = $request->input('c_lastname');
        $otdoc->license = $request->input('license');
        $otdoc->mileage = $request->input('mileage');
        $otdoc->ordernumber = $request->input('ordernumber');

        $otdoc->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'La orden de reparación No. '.$doc.' '.'fue modificada de forma exitosa');

        //Redirect to another page
        return redirect()->route('otdocs.show', $otdoc->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $otdoc = Otdocs::find($id);
        $doc = $otdoc->ordernumber;
        $otdoc->delete();

        Session::flash('success', 'La orden de reparación No. '.$doc.' '.' fue eliminada de forma exitosa');

        return redirect()->route('otdocs.index');
    }

    /**
     * Cancel the specified resource from storage
     *
     * @param  int $id
     * @return  \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $otdocs = Otdocs::find($id);
        $doc = $otdocs->ordernumber;

        //Check for resource status
        if ($otdocs->status == 'cancelled') {
            Session::flash('warning', 'La orden de reparación No. '.$doc.' '.'ya se encuentra cancelada');

            return redirect()->back();
        }
        else {
            $otdocs->status = 'cancelled';

            $otdocs->save();

            Session::flash('success', 'La orden de reparación No. '.$doc.' '.'fue cancelada de forma exitosa');

            return redirect()->back();
        }
    }
}
