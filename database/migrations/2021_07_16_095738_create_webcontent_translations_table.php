<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebContentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webcontent_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main content model
            $table->unsignedBigInteger('web_content_id');
            $table->unique(['web_content_id', 'locale']);
            $table->foreign('web_content_id')->references('id')->on('webcontents')->onDelete('cascade');

            // Fields that will be created in different languages
            $table->string('title');
            $table->longText('content');
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webcontent_translations');
    }
}
