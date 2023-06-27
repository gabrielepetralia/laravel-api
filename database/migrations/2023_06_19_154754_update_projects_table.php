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
    Schema::table('projects', function (Blueprint $table) {
      $table->string('img_path')->nullable()->after('slug');
      $table->string('img_original_name')->nullable()->after('slug');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('projects', function (Blueprint $table) {
      $table->dropColumn('img_path');
      $table->dropColumn('img_original_name');
    });
  }
};
