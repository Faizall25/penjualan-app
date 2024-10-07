<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_city'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('customer_name', 'like', '%' . $search . '%')
            ->orWhere('customer_city', 'like', '%' . $search . '%');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
