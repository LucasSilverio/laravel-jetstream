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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('method_id');
            $table->decimal('value', 10, 2);
            $table->date('term')->nullable();
            $table->timestamps();

            $table->foreign('method_id')->references('id')->on('methods');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finances', function(Blueprint $table){
            $table->dropForeign('finances_method_id_foreign');
            $table->dropForeign('finances_event_id_foreign');
        });
        Schema::dropIfExists('finances');
    }
};
