<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio', function (Blueprint $table) {
            $table->integer('order')->unsigned()->default(99)->index();

            $table->integer('folder_id')->unsigned();
            $table->foreign('folder_id')
                    ->references('id')
                    ->on('folders')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')
                    ->references('id')
                    ->on('photos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                    
            $table->primary(['folder_id', 'photo_id'])->unique()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio');
    }
}
