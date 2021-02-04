<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 100);
            $table->integer('office');
            $table->integer('das');
            $table->integer('zero_one');
            $table->integer('zero_two');
            $table->integer('techmate');
            $table->integer('totalStock');
            $table->decimal('otherSalesRate', $precision = 8, $scale = 2);
            $table->decimal('PurchaseRate', $precision = 8, $scale = 2);
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
        Schema::dropIfExists('stocks');
    }
}
