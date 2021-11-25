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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('mobile_phone_number')->nullable();
            $table->string('company_name');
            $table->string('tax_number')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->boolean('active')->default(false);
            $table->integer('category_id')->nullable();
            $table->char('average_order_time')->nullable();
            $table->boolean('first_login')->default(true);
            $table->boolean('premium')->default(false);
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
