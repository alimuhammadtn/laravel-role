<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Transaction_user;
use DB;
use Carbon\Carbon;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::orderBy('id','DESC')->paginate(5);

        return view('transactions.index',compact('transactions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = User::pluck('name','id');
        return view('transactions.create',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction              = new Transaction();

        $tarsaction_member        = [];      

        $transaction->title       = $request->input('title');

        $transaction->amount      = $request->input('amount');

        $transaction->created_at  = Carbon::createFromFormat('d/m/Y', $request->input('created'),null);

        $transaction->description = $request->input('description');

        $transaction->user_id     = auth()->user()->id;

        $transaction->save();        

        //ADD TO TRANSACTION USER TABLE
        foreach ($request->input('members') as $key => $value) {         
            
            $tarsaction_member[] = ['user_id'=> $value,

                                     'amount'=> $transaction->amount,

                             'transaction_id'=> $transaction->id];
        }
        Transaction_user::insert($tarsaction_member);   

        return redirect()->route('transactions.index')->with('success','New transaction added');       
    }
   
    public function show($id)
    {
       
       $show_members = Transaction_user::where('transaction_id', '=', $id)->with('user')->get();   
       
       return response()->json($show_members);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
