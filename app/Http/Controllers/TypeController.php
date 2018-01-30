<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make;
use App\Type;
use Session;

class TypeController extends Controller
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
            $types = Type::orderBy('id', 'asc')->paginate(20);
        }
        else{
            $types = Type::where('name', 'like', '%'.$search.'%')->orwhereHas('make', function($query) use($search){
                    $query->where('name', 'like', '%'.$search.'%');
                })->paginate(20);
        }

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makes = Make::all();
        return view('types.create', compact('makes'));
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
            'name' => 'required|max:20|regex:/^[a-zA-Z0-9\s-]*$/u',
            'make_id' => 'required'
        ];

        $this->validate($request, $data);

        $type = new Type;
        $type->name = $request->name;
        $type->make_id = $request->make_id;
        $type->save();

        //Display a flash message on succesfull submit
        Session::flash('success', 'El tipo de vehículo fue creado de forma exitosa');

        //Redirect to another page
        return redirect()->route('types.index');
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
        $makes = Make::all();
        $type = Type::find($id);
        $make_id = Make::find($type->make_id);
        return view('types.edit', compact('makes', 'type', 'make_id'));
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
        $type = Type::find($id);

        //Regex to accept only letters, hyphens and whitespaces
        $data = [
            'name' => 'required|max:20|regex:/^[a-zA-Z0-9\s-]*$/u',
            'make_id' => 'required'
        ];

        $this->validate($request, $data);

        $type->name = $request->input('name');
        $type->make_id = $request->input('make_id');
        $type->save();

        Session::flash('success', 'El tipo de vehículo No.'.' '.$type->id.' '.'fue modificado de forma exitosa');

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();

        Session::flash('success', 'El tipo de vehículo No.'.' '.$type->id.' '.'fue eliminado de forma exitosa');

        return redirect()->route('types.index');
    }
}
