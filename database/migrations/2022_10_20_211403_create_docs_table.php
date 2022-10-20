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
        Schema::create('docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_no');
            $table->bigInteger('complaint_id')->unsigned();
            $table->unique(['complaint_id', 'file_no'], "complaintfile");
            $table->string('orig_name', 255)->nullable();
            $table->string('filename', 255)->nullable();
            $table->date('filedate', 0)->nullable();
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
        Schema::dropIfExists('docs');
    }
};
