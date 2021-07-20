<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverymen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile_phone_number');
            $table->integer('address_id')->nullable() ;
            $table->date('birth_date')->nullable();
            $table->string('nacionality')->nullable();
            $table->string('identity_card_number')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('social_insurance_number')->nullable();
            $table->string('driving_license_name')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->boolean('active')->default(false);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('deliverymen');
    }
}
