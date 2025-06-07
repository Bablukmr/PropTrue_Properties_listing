<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOpeningDatesToJobOpeningsTable extends Migration
{
    public function up()
    {
        Schema::table('job_openings', function (Blueprint $table) {
           $table->date('opening_start_date')->nullable();
$table->date('opening_end_date')->nullable();

        });
    }

    public function down()
    {
        Schema::table('job_openings', function (Blueprint $table) {
            $table->dropColumn(['opening_start_date', 'opening_end_date']);
        });
    }
}
