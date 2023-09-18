<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number', 15)->after('username');
            $table->string('avatar', 255)->nullable()->after('phone_number');
            $table->string('address', 255)->nullable()->after('avatar');
            $table->string('first_name', 255)->nullable()->after('address');
            $table->string('last_name', 255)->nullable()->after('first_name');
            $table->integer('sex')->default('1')->after('last_name');
            $table->string('last_login', 255)->after('sex');
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
            $table->dropColumn("username");
            $table->dropColumn('phone_number', 15);
            $table->dropColumn('avatar', 255);
            $table->dropColumn('address', 255);
            $table->dropColumn('first_name', 255);
            $table->dropColumn('last_name', 255);
            $table->dropColumn('sex');
            $table->dropColumn('last_login', 255);
        });
    }
};
