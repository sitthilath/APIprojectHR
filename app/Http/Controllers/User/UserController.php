<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
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
        $user = User::all();
        return response()->json(['data'=>$user],200);
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
        $rules = [];

        $this->validate($request,$rules);

        $data = $request->all();
 
        $user = User::create($data);
 
        return response()->json(['data' => $user],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return response()->json(['data' => $user],200);
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
        $user = User::findOrFail($id);

     $rules = [];
     $this->validate($request,$rules);
     if($request->has('budget_company')){
         $user->budget_company = $request->budget_company ;

     }

     if($request->has('previous')){
        $user->previous = $request->previous ;

    }

    if($request->has('status')){
        $user->status = $request->status ;

    }

    if($request->has('card_number_employee')){
        $user->card_number_employee = $request->card_number_employee ;

    }

    if($request->has('name')){
        $user->name = $request->name ;

    }
    if($request->has('surname')){
        $user->surname = $request->surname ;

    }

    if($request->has('position_id')){
        $user->position_id = $request->position_id ;

    }

    if($request->has('start_date')){
        $user->start_date = $request->start_date ;

    }

    if($request->has('levelemployee_id')){
        $user->levelemployee_id = $request->levelemployee_id ;

    }

    if($request->has('report_to')){
        $user->report_to = $request->report_to ;

    }

    if($request->has('line_report')){
        $user->line_report = $request->line_report ;

    }

    if($request->has('institution_id')){
        $user->institution_id = $request->institution_id ;

    }
    
    if($request->has('department_id')){
        $user->department_id = $request->department_id ;

    }
 
    if($request->has('stationed_id')){
        $user->stationed_id = $request->stationed_id ;

    }
     
    if($request->has('area_id')){
        $user->area_id = $request->area_id ;

    }
     
    if($request->has('date_of_birth')){
        $user->date_of_birth = $request->date_of_birth ;

    }
    
    if($request->has('tel')){
        $user->tel = $request->tel ;

    }

     
    if($request->has('history_working')){
        $user->history_working = $request->history_working ;

    }
    
    if($request->has('edu_background')){
        $user->edu_background = $request->edu_background ;

    }
     
    if($request->has('company_guarantee')){
        $user->company_guarantee = $request->company_guarantee ;

    }
    
    if($request->has('village_id')){
        $user->village_id = $request->village_id ;

    }
  
    if($request->has('district_id')){
        $user->district_id = $request->district_id ;

    }
     
    if($request->has('province_id')){
        $user->province_id = $request->province_id ;

    }
    
    if($request->has('census')){
        $user->census = $request->census ;

    }
    
    if($request->has('penalty_notification')){
        $user->penalty_notification = $request->penalty_notification ;

    }

    if($request->has('certificate_residence')){
        $user->certificate_residence = $request->certificate_residence ;

    }
    
    if($request->has('certificate_medical_checkup')){
        $user->certificate_medical_checkup = $request->certificate_medical_checkup ;

    }
    
    if($request->has('quick_contact_information')){
        $user->quick_contact_information = $request->quick_contact_information ;

    }
    
    if($request->has('basic_salary')){
        $user->basic_salary = $request->basic_salary ;

    }
     
    if($request->has('eating_rate')){
        $user->eating_rate = $request->eating_rate ;

    }

    if($request->has('bonus')){
        $user->bonus = $request->bonus ;

    }
    
    if($request->has('phone_value')){
        $user->phone_value = $request->phone_value ;

    }
    
    if($request->has('annual_holiday')){
        $user->annual_holiday = $request->annual_holiday ;

    }

    if($request->has('appraisal_salary')){
        $user->appraisal_salary = $request->appraisal_salary ;

    }
     
    if($request->has('petrol_cost')){
        $user->petrol_cost = $request->petrol_cost ;

    }

    if($request->has('depreciation')){
        $user->depreciation = $request->depreciation ;

    }
    
    if($request->has('diligent_money')){
        $user->diligent_money = $request->diligent_money ;

    }
     
    if($request->has('accommodation_fee')){
        $user->accommodation_fee = $request->accommodation_fee ;

    }
    
    if($request->has('probation')){
        $user->probation = $request->probation ;

    }

    if($request->has('account_number')){
        $user->account_number = $request->account_number ;

    }

    if($request->has('annotation')){
        $user->annotation = $request->annotation ;

    }
    
     
    $user->save();
    
    return response()->json(['data' => $user],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['data' => $user],200);
    }
}
