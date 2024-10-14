<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',            // Allow mass assignment of 'id'
        'order_date',
        'amount',
        'customer_id',
        'salesmans_id',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('order_date', 'like', '%' . $search . '%')
            ->orWhere('amount', 'like', '%' . $search . '%');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function salesman()
    {
        return $this->belongsTo(Salesmans::class, 'salesmans_id');
    }
}
