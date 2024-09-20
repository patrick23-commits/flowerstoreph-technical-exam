<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table_name = 'order_table';
        Schema::dropIfExists($table_name);
        Schema::create($table_name, function(Blueprint $table){
            $table->id();
            $table->integer('product_id');
            $table->integer('user_id');
            $table->double('price'); 
            $table->datetimes();           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
