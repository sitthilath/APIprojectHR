<?php

namespace App\Http\Controllers\LevelEmployee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LevelEmployee\LevelEmployee;
class LevelEmployeeController extends Controller
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
        $levelemp = LevelEmployee::all() ;

        return response()->json(['data'=>$levelemp],200);
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
        $rules = [
            
        ];
 
        $this->validate($request,$rules);
 
        $data = $request->all();
 
        $levelemp = LevelEmployee::create($data);
 
        return response()->json(['data' => $levelemp],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $levelemp = LevelEmployee::findOrFail($id);

        return response()->json(['data' => $levelemp],200);
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
        $levelemp = LevelEmployee::findOrFail($id);

        $rules = [];
        $this->validate($request,$rules);
        if($request->has('levelemployee')){
            $levelemp->levelemployee = $request->levelemployee ;
   
        }

        $levelemp->save();
    
        return response()->json(['data' => $levelemp],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $levelemp = LevelEmployee::findOrFail($id);
        
         $levelemp->delete();

         return response()->json(['data' => $levelemp],200);
    }
}
