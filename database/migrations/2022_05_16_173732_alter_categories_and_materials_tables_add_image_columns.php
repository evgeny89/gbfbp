<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriesAndMaterialsTablesAddImageColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('categories') && !Schema::hasColumn('categories', 'image')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('image')->unique()->nullable();
            });
        }

        if (Schema::hasTable('materials') && !Schema::hasColumn('materials', 'image')) {
            Schema::table('materials', function (Blueprint $table) {
                $table->string('image')->unique()->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('categories') && Schema::hasColumn('categories', 'image')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }

        if (Schema::hasTable('materials') && Schema::hasColumn('materials', 'image')) {
            Schema::table('materials', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
}
