<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'customer_name',
        'customer_mobile',
        'product_name',
        'total_amount',
        'payment_status',
        'order_status',
        'payment_proof',
        'payment_verified_at',
        'ordered_at',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'payment_verified_at' => 'datetime',
        'ordered_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
