<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // id, medicine_id, quantity, unit1, unit2, unit3, unit4(1-ဖာ, 10-ဘူး, 5-ကတ်, 10-လုံး=>required,total(tab)),expire_date
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
                ->onDelete('cascade');
            $table->string('qty');
            $table->string('unit1')->nullable();//phar
            $table->string('unit2')->nullable();//bu
            $table->string('unit3')->nullable();//card
            $table->string('unit4')->nullable();//tab
            $table->string('expire_date')->nullable();//totaltab
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
        Schema::dropIfExists('stocks');
    }
}
