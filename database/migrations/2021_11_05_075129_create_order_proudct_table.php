<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProudctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('orders_id')->constrained('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('products_id')->constrained('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('Quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
