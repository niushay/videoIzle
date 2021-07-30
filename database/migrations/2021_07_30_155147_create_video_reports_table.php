<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('report_category_id');
            $table->text('info');
            $table->smallInteger('first_time');
            $table->smallInteger('second_time');
            $table->smallInteger('third_time');
            $table->timestamps();

            $table->foreign('report_category_id')
                ->references('id')
                ->on('video_report_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_reports');
    }
}
