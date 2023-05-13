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
        Schema::table('events', function(Blueprint $table){
            $table->unsignedBigInteger('method_id')
                ->after('service_id')
                ->nullable();

            $table->foreign('method_id')->references('id')->on('methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function(Blueprint $table){
            $table->dropForeign('events_method_id_foreign');

            $table->dropColumn('method_id');
        });
    }
};
