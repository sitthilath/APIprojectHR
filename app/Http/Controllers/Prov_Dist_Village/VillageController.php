<?php

namespace App\Http\Controllers\Prov_Dist_Village;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Village\Village;
class VillageController extends Controller
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
        $village = Village::all();
        return response()->json(['data',$village],200);
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
        $village = Village::create($data);

        return response()->json(['data'=>$village],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $village = Village::findOrFail($id);
        return response()->json(['data'=>$village],200);
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
        $village = Village::findOrFail($id);
        $rules = [];
        $this->validate($request,$rules);
        
        if($request->has('village_name')){
            $village->village_name = $request->village_name;

        }

        $village->save();

        return Response()->json(['data'=>$village],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $village = Village::findOrFail($id);
        $village->delete();

        return response()->json(['data'=>$village],200);
    }
}
