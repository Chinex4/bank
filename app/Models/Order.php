<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'email',
        'reference',
        'user_id',
        'order_id',
        'status'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
