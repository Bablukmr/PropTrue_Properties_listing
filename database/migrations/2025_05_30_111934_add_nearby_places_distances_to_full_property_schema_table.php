<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('full_property_schema', function (Blueprint $table) {
            $table->string('bazar_distance_km', 100)->nullable()->after('google_map_link');
    $table->string('hospital_distance_km', 100)->nullable()->after('bazar_distance_km');
    $table->string('school_distance_km', 100)->nullable()->after('hospital_distance_km');
    $table->string('bus_stand_distance_km', 100)->nullable()->after('school_distance_km');
    $table->string('junction_distance_km', 100)->nullable()->after('bus_stand_distance_km');
    $table->string('airport_distance_km', 100)->nullable()->after('junction_distance_km');
        });
    }

    public function down()
    {
        Schema::table('full_property_schema', function (Blueprint $table) {
            $table->dropColumn([
                'bazar_distance_km',
                'hospital_distance_km',
                'school_distance_km',
                'bus_stand_distance_km',
                'junction_distance_km',
                'airport_distance_km'
            ]);
        });
    }
};
