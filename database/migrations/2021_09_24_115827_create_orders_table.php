<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('campaign_id')->nullable()->constrained();
            $table->foreignId('order_status_type_id')->default(1)->constrained();
            $table->foreignId('partner_id')->constrained();
            
            $table->string('tax_name')->nullable();
            $table->string('tax_number')->nullable();
            
            $table->integer('amount')->nullable();

            $table->timestamp('deliver_at')->nullable();	
            $table->timestamp('delivered_at')->nullable();	
            $table->timestamp('submitted_at')->nullable();	
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
