<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $table = "user_table";
    protected $primary_key = "id";
    public $incrementing = true;
    public $timestamps = true;

    public function orders() : HasOne{
        return $this->hasOne(Order::class);
    }
}
