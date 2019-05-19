<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 4)->unique();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 6, 2);
            $table->string('image_name')->nullable();
            $table->boolean('disponibility');
            $table->integer('drink_type_id')->unsigned();
            $table->foreign('drink_type_id')->references('id')->on('drink_types');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
