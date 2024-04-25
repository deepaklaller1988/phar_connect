<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->tinyInteger('education_level')->after('end_date')->nullable();
            $table->tinyInteger('position_type')->after('education_level')->nullable();
            $table->tinyInteger('experience_level')->after('position_type')->nullable();
            $table->string('location')->after('experience_level')->nullable();
            $table->tinyInteger('zone')->after('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
