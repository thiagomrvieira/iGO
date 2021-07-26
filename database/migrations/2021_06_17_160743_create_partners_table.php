<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('address_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_phone_number')->nullable();
            $table->string('company_name');
            $table->string('tax_number')->nullable();
            $table->integer('category_id');
            $table->dateTime('approved_at')->nullable();
            $table->boolean('active')->default(false);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->boolean('first_login')->default(true);
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
        Schema::dropIfExists('partners');
    }
}
