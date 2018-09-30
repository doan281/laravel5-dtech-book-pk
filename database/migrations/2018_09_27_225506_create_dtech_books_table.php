<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDtechBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtech_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('author', 255)->nullable();
            $table->string('title', 255);
            $table->text('summary', 500)->nullable();
            $table->string('avatar', 255);
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('total_view')->default(0);
            $table->bigInteger('total_like')->default(0);
            $table->bigInteger('total_dislike')->default(0);
            $table->bigInteger('total_share')->default(0);
            $table->bigInteger('total_interested')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtech_books');
    }
}
