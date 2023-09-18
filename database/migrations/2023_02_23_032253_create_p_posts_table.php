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
        Schema::create('p_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_category_id');
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->longText('content')->nullable();
            $table->timestamp('pushlished_at')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_posts');
    }
};
