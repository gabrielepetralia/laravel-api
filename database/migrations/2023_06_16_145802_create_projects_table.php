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
      Schema::create('projects', function (Blueprint $table) {
        $table->id();

        $table->string('name', 100);
        $table->string('slug', 100)->unique();
        $table->text('description')->nullable();
        $table->string('start_date');
        $table->string('end_date')->nullable();
        $table->boolean('is_finished')->default(0);

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
        Schema::dropIfExists('projects');
    }
};
