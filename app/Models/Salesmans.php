<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesmans extends Model
{
    use HasFactory;

    protected $fillable = [
        'salesman_name',
        'salesman_city',
        'commission'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('salesman_name', 'like', '%' . $search . '%')
            ->orWhere('commission', 'like', '%' . $search . '%');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
