<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToOccasions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('occasions', function($table) {
            $table->string('kenteken_kleur');
            $table->string('soort_voertuig');
            $table->string('voertuig_staat');
            $table->string('intern_id');
            $table->integer('kilometer_stand');
            $table->boolean('nap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('occasions', function($table) {
            $table->dropColumn(['kenteken_kleur', 'soort_voertuig', 'voertuig_staat', 'intern_id', 'kilometer_stand', 'nap']);
        });
    }
}
