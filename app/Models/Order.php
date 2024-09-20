<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order_table";

    protected $primary_key = "id";
    protected $incrementing = true;
    public $timestamps = true;
}
