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
        Schema::create('headings_services', function (Blueprint $table) {
            $table->id();
            $table->string('rate_1')->nullable();
            $table->string('rate_2')->nullable();
            $table->string('rate_3')->nullable();
            $table->string('link')->nullable();
            $table->string('top_heading_other_service_card')->nullable();
            $table->string('heading_other_service')->nullable();
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
        Schema::dropIfExists('headings_services');
    }
};
