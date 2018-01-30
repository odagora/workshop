<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make;
use Session;

class MakeController extends Controller
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
            $makes = Make::orderBy('id', 'asc')->paginate(10); 
        }
        else{
           $makes = Make::where('name', 'like', '%'.$search.'%')->paginate(5); 
        }

        return view('makes.index', compact('makes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Regex to accept only letters, hyphens and whitespaces
        $data = [
            'name' => 'required|max:20|regex:/^[a-zA-Z0-9\s-]+$/u'
        ];

        $this->validate($request, $data);

        $make = new Make;
        $make->name = $request->name;
        $make->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'La marca fue creada de forma exitosa');

        //Redirect to another page
        return redirect()->route('makes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $make = Make::find($id);
        return view('makes.edit', compact('make'));
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
        $make = Make::find($id);

        //Regex to accept only letters, hyphens and whitespaces
        $data = [
            'name' => 'required|max:20|regex:/^[a-zA-Z0-9\s-]/u'
        ];

        $this->validate($request, $data);

        $make->name = $request->input('name');
        $make->save();

        Session::flash('success', 'La marca de vehículo No.'.' '.$make->id.' '.'fue modificada de forma exitosa');

        return redirect()->route('makes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $make = Make::find($id);
        $make->delete();

        Session::flash('success', 'La marca de vehículo No.'.' '.$make->id.' '.'fue eliminada de forma exitosa');

        return redirect()->route('makes.index');
    }
}
