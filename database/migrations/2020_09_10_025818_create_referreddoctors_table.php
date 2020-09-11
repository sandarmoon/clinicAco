<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferreddoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referreddoctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_doctor_id');
            $table->unsignedBigInteger('to_doctor_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('status')->default(1);
            $table->string('reason');
            $table->foreign('from_doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade');
            $table->foreign('to_doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade');
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
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
        Schema::dropIfExists('referreddoctors');
    }
}
