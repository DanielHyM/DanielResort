<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBookingsModifyColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->addColumn('time','check_in_time')->after('check_in_date');
            $table->addColumn('time','check_out_time')->after('check_out_date');
            $table->date('check_in_date')->change();
            $table->date('check_out_date')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('check_in_time');
            $table->dropColumn('check_out_time');
            $table->dateTime('check_in_date')->change();
            $table->dateTime('check_out_date')->change();
        });
    }
}
