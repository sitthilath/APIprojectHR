<?php

namespace App\Http\Controllers\Stationed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Stationed\Stationed;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class StationedController extends Controller
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
        $stationed = Stationed::all();
        return response()->json(['data'=>$stationed],200);
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
        $stationed = Stationed::create($data);

        return response()->json(['data'=>$stationed],200);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stationed = Stationed::findOrFail($id);
        return response()->json(['data'=>$stationed],200);
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
        $stationed = Stationed::findOrFail($id);
        $rules = [];
        $this->validate($request,$rules);
        
        if($request->has('stationed_name')){
            $stationed->stationed_name = $request->stationed_name;

        }

        $stationed->save();

        return Response()->json(['data'=>$stationed],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stationed = Stationed::findOrFail($id);
        $stationed->delete();

        return response()->json(['data'=>$stationed],200);
    }
}
