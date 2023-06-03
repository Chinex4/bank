<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class HomeControlller extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
    }

   public function index()
{
    $user = Auth::user();
    $depositbalance = TransactionHistory::where('user_id', $user->id)->get();


    // Calculate the total deposit
    $totaldeposit = 0;
    if ($depositbalance) {
        foreach($depositbalance as $deposit){
            if ($deposit->status == '1') {
                $totaldeposit += $deposit->amount;
            }
        }
    }




    // Retrieve the user record
    $user = User::find(auth()->user()->id);
    if ($user) {
        // Calculate the profit based on the current total deposit
        $profit = $totaldeposit * 2;

        // Check if the user amount is less than the profit
        if ($user->amount < $profit) {
            // Reduce the profit and total deposit proportionally
            $reductionRatio = $user->amount / $profit;
            $profit = $user->amount;
            $totaldeposit = $totaldeposit * $reductionRatio;
            // $user->save();/

        }
    }



    return view('dashboard.index', [
        'user' => $user,
        'payed' => $totaldeposit,
        'totalprofit' => $profit,
        'user' => $user, // Use the user's amount property here
    ]);
}



    public function profile(){
        $users = Auth::user();
        return view('dashboard.profile', compact('users'));
    }



    public function update_profile(Request $request, $id){
        $request->validate([
            'image'=>['image', 'mimes:png,jpg', 'max:2048'],
        ]);

        if($request->hasFile('image')) {
            $image_file = time().'.'.$request->image->extension();
            $request->image->move(public_path(''),$image_file);
        }
        try{
            $users = User::findOrFail($id);
            $users->update([
                'image'=>$image_file ?? $users->image,
                'name'=> $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
            ]);
            Alert::success('Success', 'Updated Successfull');
            return back();
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            Alert::error('Error', 'Something went Wrong');
            return back();
        }
    }



    public function validatepassword(Request  $request){
        $this->validate($request, [
            'current_password'=>['required', 'string'],
            'new_password'=>['required', 'string'],
        ]);
        # check for current password match
        if (password_verify($request->current_password, auth()->user()->password)) {
            # if true
            if ($request->new_password == $request->Confirm_password) {
                # send otp to user email and the password in datebase
                session(['new_password'=> $request->new_password]);
                auth()->user()->update([
                    'password'=>Hash::make(session('new_password')),
                ]);
                Alert::success('success', 'Password Change Successful');
                return redirect(route('profile-page'));
            } else{
                Alert::error('error', 'Error! Password Mismatch');
                return back();
            }
        }else{
            Alert::error('error',  'Error! The password does not match the current password?');
            return back();
        }
    }
}
