<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOccasionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('occasions', function($table) {
            $table->string('select_model');
            $table->string('select_type');
            $table->string('meldcode');
            $table->boolean('check_apk');
            $table->date('apk_datum');
            $table->date('deel1_datum');
            $table->boolean('check_afwijkend_bouwjaar');
            $table->string('afwijkend_bouwjaar');
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
            $table->dropColumn(['select_model', 'select_type', 'meldcode', 'check_apk', 'apk_datum', 'deel1_datum', 'check_afwijkend_bouwjaar', 'afwijkend_bouwjaar']);
        });
    }
}
