<?php

namespace App\Http\Controllers;
use App\User;
use App\bills;
use Illuminate\Http\Request;
use App\bill_users;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = bills::orderBy('id','DESC')->with('bill_users')->get();                

        return view('bills.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $users = User::pluck('name','id');

        return view('bills.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
       
        $bills = bills::create($request->all());        

        $bills_member = [];      ;
        //ADD TO BILLS USER TABLE
        foreach ($request->bill_users as $key=>$value) {         
            
            if($request->each_amount[$key]>0)
            {
                $bills_member[] = ['bill_id'=> $bills->id,

                                'user_id'=> $value,

                                    'amount'=> $request->each_amount[$key],

                                    'days'=> $request->each_days[$key]];
            } 
        }

        bill_users::insert($bills_member);       

        return redirect()->route('bills.index')->with('success','New Record added');  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill_users = bill_users::where('bill_id', '=', $id)->with('user')->get();   
       
        return response()->json($bill_users);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit(bills $bills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bills $bills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = bills::find($id);
        $bill->bill_users()->delete();
        $bill->delete();
        return redirect()->route('bills.index')->with('error','Record Deleted');  
    }

   
}
