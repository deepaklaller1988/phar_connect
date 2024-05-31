<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name')->nullable();
            $table->string('event_name')->after('certifications')->nullable();
            $table->string('start_date')->after('event_name')->nullable();
            $table->string('end_date')->after('start_date')->nullable();
            $table->tinyInteger('education_level')->after('end_date')->nullable();
            $table->tinyInteger('position_type')->after('education_level')->nullable();
            $table->tinyInteger('experience_level')->after('position_type')->nullable();
            $table->string('position_title')->after('experience_level')->nullable();
            $table->longText('representatives')->after('company_profile')->nullable();
            $table->string('industry')->after('representatives')->nullable();
            $table->string('linkedin_profile')->after('industry')->nullable();
            $table->string('twiter_profile')->after('linkedin_profile')->nullable();
            $table->string('agenda')->after('twiter_profile')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'last_name', 
                'event_name', 
                'start_date', 
                'end_date', 
                'education_level', 
                'position_type', 
                'experience_level', 
                'position_title', 
                'representatives', 
                'industry', 
                'linkedin_profile', 
                'twiter_profile',
                'agenda'
            ]);
        });
    }
}
