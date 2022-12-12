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

            $table->string('complainanttype', 2)->nullable(false);
            $table->bigInteger('user_id')->unsigned();
            $table->string('complaintno', 11)->unique();
            $table->string('controlno', 11)->nullable();
            $table->string('allegetype', 2)->nullable(false);
            $table->string('specify', 100)->nullable();

            $table->text('nid')->nullable();
            $table->text('wid')->nullable();
            $table->text('firstname')->nullable();
            $table->text('middlename')->nullable();
            $table->text('lastname')->nullable();
            $table->text('phoneno')->nullable();
            $table->text('email')->nullable();
            $table->boolean('contactyou', 1)->nullable();

            $table->boolean('reported', 1)->nullable();
            $table->string('towhom', 100)->nullable();

            $table->longText('description')->nullable();
            $table->longText('detail')->nullable();
            $table->boolean('threat', 1)->nullable();
            $table->longText('elaborate')->nullable();
            $table->boolean('evidence')->nullable();
            $table->longText('evidencedescribe')->nullable();

            $table->boolean('nopossession')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->longtext('conclusion')->nullable();

            /*             $table->string('region', 256)->nullable();
            $table->string('station', 256)->nullable();
            $table->string('department', 256)->nullable();
 */
            $table->timestamp('dateoccurred', 0)->nullable();
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
