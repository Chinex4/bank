<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'method_of_withdrawal',
        'amount',
        'address',
        'bankname',
        'accountname',
        'accountnumber',
        'swift',
        'status',
        'user_id',
    ];

    // protected $casts = [
    //     "amount" => 'integer'
    // ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
