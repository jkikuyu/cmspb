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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40)->nullable(false);

            $table->string('title', 100)->nullable(false);
            $table->longtext('content', 1)->nullable(false);
            $table->string('imagepath', 255)->nullable();
            $table->smallinteger('position')->nullable();
            $table->timestamp('expiry', 0)->nullable();
            $table->boolean('active', 1)->nullable();
            $table->string('resource_path', 100)->nullable();
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
        Schema::dropIfExists('page_contents');
    }
};
