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
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('anonymous')->nullable()->default(false);

            $table->string('complainanttype',2)->nullable(false);
            $table->string('allegetype',2)->nullable(false);
            $table->string('nid',256)->nullable();
            $table->string('wid',256)->nullable();
            $table->string('firstname',256)->nullable();
            $table->string('middlename',256)->nullable();
            $table->string('lastname',256)->nullable();
            $table->string('phone',256)->nullable();
            $table->string('email',256)->nullable();
            $table->boolean('reported',1)->nullable();
            $table->string('towhom',256)->nullable();
            $table->longText('description')->nullable();
            $table->longText('detail')->nullable();
            $table->boolean('threat',1)->nullable();
            $table->longText('elaborate')->nullable();
            $table->boolean('evidence')->nullable();
            $table->boolean('nopossession')->nullable();

            $table->string('region',256)->nullable();
            $table->string('station',256)->nullable();
            $table->string('department',256)->nullable();
            $table->timestamp('datefrom',0)->nullable();
            $table->timestamp('dateto',0)->nullable();

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
        Schema::dropIfExists('complaints');
    }
};
