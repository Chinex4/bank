<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Created;
use App\Mail\Deposit;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::orderBy('id', 'desc')->get();
        // $transaction = TransactionHistory::orderBy('id', 'desc')->where('user_id', $user)->get();
        $transaction = TransactionHistory::orderBy('id', 'desc')->get();


        return view('admin.transaction.index', compact('transaction', 'user'));
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
        //
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
        //
        try{
            $credit = TransactionHistory::findOrFail($id);
            Alert::success('success', 'Edit Successfully');
            return view('admin.transaction.edit', compact('credit'));
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            Alert::error('error', 'something went worry');
            return back();
        }
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
        try{
            $transaction = TransactionHistory::findOrFail($id);
            $userid = $request->input('user_id');
            $transaction->update([
                'amount'=>$request->input('amount'),
                'image'=>update_image('transaction-image', $transaction->image, 'image'),
                'status'=>$request->status == 'on' ? 1 : 0,
                'user_id'=>$userid,
            ]);
            // dd($request->all());
            $usermail = User::where('id', $userid)->first();
            // dd($usermail->email);
            $useramount = $request->amount;
            Mail::to($usermail->email)->send(new  Created($useramount, $usermail));
            Alert::success('success', 'Update Successfully');
            return redirect(route('admin.transaction.index'));
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred!');
        }
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
        try {
            $transaction = TransactionHistory::findOrFail($id);
            $transaction->delete();
            Alert::success('success', 'Delete Successfully');
            return back();
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return back()->with('error', 'Something Went Worry');
        }
    }
}
