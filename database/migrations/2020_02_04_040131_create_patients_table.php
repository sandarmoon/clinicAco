<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PRN');
            $table->unsignedBigInteger('reception_id');
            $table->string('name');
            $table->string('fatherName')->nullable();
            $table->integer('age')->nullable();
            $table->boolean('child')->nullable();
            $table->string('gender')->nullable();
            $table->string('phoneno')->nullable();
            $table->text('address')->nullable();
            $table->boolean('married_status')->default('0');
            $table->integer('status')->default('0');
            $table->boolean('pregnant')->default('0');
            $table->string('body_weight')->nullable();
            $table->string('allergy')->nullable();
            $table->string('job')->nullable();
            $table->text('file')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('reception_id')
                ->references('id')->on('receptions')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
