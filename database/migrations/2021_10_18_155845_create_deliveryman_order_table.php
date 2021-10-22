<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverymanOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveryman_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deliveryman_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained();
            $table->foreignId('order_delivery_status_type_id')->constrained();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('deliveryman_order');
    }
}
