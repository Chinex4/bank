<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WelletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wallet = Wallet::orderBy('id', 'desc')->paginate(3);
        return view('admin.wallet.index', compact('wallet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.wallet.create');
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
        $request->validate([
            'address'=>['required', 'string'],
        ]);
        try{
            Wallet::create([
                'address'=>$request->input('address')
            ]);
            return redirect(route('admin.wallet.index'))->with('success',  'Successful');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred!');
        }
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
            $wallet = Wallet::findOrFail($id);
            return view('admin.wallet.edit', compact('wallet'))->with('success', 'Successful');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error', 'An error occurred!');
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
            $wallet = Wallet::findOrFail($id);
            $wallet->update([
                'address'=>$request->input('address'),
            ]);
            return redirect(route('admin.wallet.index'))->with('success', 'Updated Successful');
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
            $wallet = Wallet::findOrFail($id);
            $wallet->delete();
            return redirect()->route('admin.wallet.index')->with('success', 'Delete Successfully');
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return back()->with('error', 'Something Went Worry');
        }
    }
}
