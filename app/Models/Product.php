<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = "product_table";

    protected $primary_key = "id";
    protected $incrementing = true;
    public $timestamps = true;

    public function orders() : HasMany {
        return $this->hasMany(Order::class);
    }
}
