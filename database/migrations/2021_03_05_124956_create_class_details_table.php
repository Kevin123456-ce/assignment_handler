<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateClassDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_details', function (Blueprint $table) {
            $table->Increments('class_code')->key();
            $table->string('class_name');
            $table->text('class_description')->nullable();
            $table->bigInteger('user_id');
            $table->integer('participants')->nullable();
            $table->timestamps();
            // DB::statement("ALTER TABLE class_details AUTO_INCREMENT = 1234;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_details');
    }
}
