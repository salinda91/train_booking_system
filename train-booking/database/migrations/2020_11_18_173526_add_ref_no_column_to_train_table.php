<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefNoColumnToTrainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train_bookings', function (Blueprint $table) {
            $table->string('ref_no')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('train_bookings', function (Blueprint $table) {
            $table->dropColumn('ref_no');
        });
    }
}
