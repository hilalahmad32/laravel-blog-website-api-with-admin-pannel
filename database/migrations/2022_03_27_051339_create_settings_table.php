<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->text('footer_desc');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('about_title');
            $table->text('about_desc');
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
        Schema::dropIfExists('settings');
    }
};
