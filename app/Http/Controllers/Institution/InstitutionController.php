<?php

namespace App\Http\Controllers\Institution;


use App\Http\Controllers\Controller;
use App\Model\Institution\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('client.credentials');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institution = Institution::all();

        return response()->json(['data'=>$institution],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[];
        $this->validate($request,$rules);
 
        $data = $request->all();
 
        $institution = Institution::create($data);
 
        return response()->json(['data' => $institution],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institution = Institution::findOrFail($id);

        return response()->json(['data' => $institution],200);
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
        $institution = Institution::findOrFail($id);

        $rules = [];
        $this->validate($request,$rules);
        if($request->has('institution_name')){
            $institution->institution_name = $request->institution_name ;
   
        }

        $institution->save();
    
        return response()->json(['data' => $institution],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        
        $institution->delete();

        return response()->json(['data' => $institution],200);
    }
}
