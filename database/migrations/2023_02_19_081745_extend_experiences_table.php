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
        Schema::table('experiences', function (Blueprint $table){
            $table->unsignedBigInteger('type_id')->after('vendor_id');
            $table->foreign('type_id')->on('types')->references('id');

            $table->unsignedBigInteger('trip_type_id')->after('type_id');
            $table->foreign('trip_type_id')->on('trip_types')->references('id');

            $table->unsignedBigInteger('charter_type_id')->after('trip_type_id');
            $table->foreign('charter_type_id')->on('charter_types')->references('id');

            $table->unsignedBigInteger('departure_id')->after('charter_type_id');
            $table->foreign('departure_id')->on('departures')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiences', function (Blueprint $table){
            $table->dropForeign(['type_id', 'tripe_type_id', 'charter_type_id', 'departure_id']);
        });
    }
};
