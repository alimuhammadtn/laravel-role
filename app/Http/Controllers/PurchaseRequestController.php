<?php

namespace App\Http\Controllers;

use App\purchase_request;

use Illuminate\Http\Request;

use App\User;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* $purchase_requests = purchase_request::orderBy('id','DESC')->paginate(5);                

        return view('purchase_request.index',compact('purchase_requests'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
        $purchase_requests = purchase_request::orderBy('id','DESC')->get();                

        return view('purchase_request.index',compact('purchase_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase_request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase_request               = new purchase_request();

        $purchase_request->title        = $request->title;

        $purchase_request->quantity     = $request->quantity;

        $purchase_request->description  = $request->description;

        $purchase_request->user_id      = auth()->user()->id; 

        $purchase_request->save();       
        
        return redirect()->route('purchase_request.index')->with('success','New Record added');    ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\purchase_request  $purchase_request
     * @return \Illuminate\Http\Response
     */
    public function show(purchase_request $purchase_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\purchase_request  $purchase_request
     * @return \Illuminate\Http\Response
     */
    public function edit(purchase_request $purchase_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\purchase_request  $purchase_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchase_request $purchase_request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\purchase_request  $purchase_request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase_request = purchase_request::find($id);
        $purchase_request->delete();
        return redirect()->route('purchase_request.index')->with('error','Record Deleted');    
    }
}
