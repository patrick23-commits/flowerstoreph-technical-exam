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
        $table_name = 'product_table';
        Schema::dropIfExists($table_name);
        Schema::create($table_name, function(Blueprint $table) {
            $table->id();
            $table->string('product_name', 250);
            $table->text('product_description');
            $table->integer('quantity');
            $table->double('price');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
