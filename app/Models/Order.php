<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders'; // Veritabanındaki tablo adını belirtin, eğer varsayılan isimden farklı ise
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'product_quantity',
        'price',
        'discount',
        'emailAddress',
        'first_name',
        'last_name',
        'phone',
        'street_address',
    ];
}
