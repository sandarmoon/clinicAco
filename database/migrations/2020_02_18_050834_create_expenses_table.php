<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('description')->nullable();
            $table->string('amount')->nullable();
            $table->string('files')->nullable();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('category_id');
             $table->foreign('owner_id')
                ->references('id')->on('owners')
                ->onDelete('cascade');
                $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('expenses');
    }
}
