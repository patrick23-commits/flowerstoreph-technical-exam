<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $table = "product_table";

    protected $primary_key = "id";
    public $incrementing = true;
    public $timestamps = true;

    public $fillable = [
        'product_name',
        'product_description',
        'price',
        'quantity',
        'status'
    ];
    public function orders() : HasOne {
        return $this->hasOne(Order::class);
    }
}
