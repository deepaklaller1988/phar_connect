<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('type')->nullable();
            $table->string('company_website')->after('phone')->nullable();
            $table->text('company_profile')->after('company_website')->nullable();
            $table->string('location')->after('company_profile')->nullable();
            $table->string('key_services')->after('location')->nullable();
            $table->string('certifications')->after('key_services')->nullable();
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
            //
        });
    }
}
