<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::table('our_team', function (Blueprint $table) {
        $table->boolean('display_on_team')->default(true)->after('status');
    });
}

public function down()
{
    Schema::table('our_team', function (Blueprint $table) {
        $table->dropColumn('display_on_team');
    });
}
};
