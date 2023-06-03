<?php

namespace App\Http\Controllers;

use App\Mail\Deposit;
use App\Models\Transaction;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    //
    public function deposit(){
        $walletaddress = Wallet::orderBy('id', 'desc')->latest()->get();
        if (!empty($walletaddress)) {
            // return 0;
            // echo "hh";
        }

        return view('dashboard.deposite', compact('walletaddress'));
    }

    public function transaction(){
        $deposits = TransactionHistory::where('user_id', auth()->user()->id)->paginate(5);
        $withdraws = Transaction::where('user_id', auth()->user()->id)->paginate(5);

        $transactions = [];

        foreach ($deposits as $deposit) {
            $transaction = [
                'date' => $deposit->created_at->diffforHumans(),
                'type' => 'deposit',
                'amount' => $deposit->amount,
                'status'=>$deposit->status,
            ];
            $transactions[] = $transaction;
        }

        foreach ($withdraws as $withdraw) {
            $transaction = [
                'date' => $withdraw->created_at->diffforHumans(),
                'type' => 'withdraw',
                'amount' => $withdraw->amount,
                'status'=>$withdraw->status,
            ];
            $transactions[] = $transaction;
        }

        usort($transactions, function ($a, $b) {
            return $a['date'] <=> $b['date'];
        });
        // dd($transactions);
        return view('dashboard.transaction', compact('transactions'));
    }

    public function confirmDeposit(Request $request){
           $request->validate([
                'amount'=>['required', 'string','numeric'],
                'image'=>['image', 'nullable', 'max:500', 'mimes:png,jpg,pdf,jpeg,svg'],
                'status'=>['nullable', 'string']
           ]);
        //    dd($request->all());
           try{
            $userid = auth()->user()->id;
            // dd($userid);
            $invoice =  TransactionHistory::create([
                'amount'=>$request->amount,
                'image'=>upload_single_image('transaction-image', 'image'),
                'user_id'=>$userid,
                'status' => $request->status == 'on' ? 1 : 0,
              ]);
              $userdetails = User::where('id', $userid)->first();
              $username = $userdetails->name;
              Mail::to('info@n.com')->send(new Deposit($invoice, $username));
              return back()->with('success','Data sent Successfully');
           }catch(\Exception  $exception){
              Log::error($exception->getMessage());
              return back()->with('error', 'Oops something went worry');
           }
    }

    public function withdrawal(){
        $user = Auth::user();
        return view('dashboard.withdrawal', compact('user'));
    }

    public function withdrawalStore(Request  $request){

        try{
            $request->validate([
                'method_of_withdrawal'=>['nullable', 'string'],
                'amount'=>[ 'nullable', 'string'],
                'address'=>['nullable', 'string'],
                'bankname'=>['nullable', 'string'],
                'accountname'=>['nullable', 'string'],
                'accountnumber'=>['nullable', 'string'],
                'swift'=>['nullable', 'string'],
            ]);
            // checking package plan
            $user = Auth::user();
            // checking user balance
            if ($user->amount >= $request->amount) {
                // deduct transfer amount from user balance
                // $user->amount -= $request->amount;
                // $user->save();

                // create  transaction
                Transaction::create($request->all());
                 return redirect(route('transaction-page'))->with('model',  'success');
                // Alert::info('Transaction', 'Transaction Inprogress');

            } else {
                Alert::info('Error', 'Insufficient  Funds');
                return back();
            }
            return back();

        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            Alert::error('error', 'Something went worry');
            return back();
        }
    }
}
