<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaintJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paint_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("plate_number")->unique();
            $table->string("current_color");
            $table->string("target_color");
            $table->unsignedBigInteger("status_id")->nullable()->default(1);
            $table->foreign("status_id")
                ->references("id")->on("statuses")
                ->onDelete("set null")
                ->onUpdate("set null");
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
        Schema::dropIfExists('paint_jobs');
    }
}
