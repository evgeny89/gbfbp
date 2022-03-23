<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    const ROLES = [
        [
            'name' => 'Пользователь',
            'slug' => 'user',
            'level' => 1,
        ],
        [
            'name' => 'Модератор',
            'slug' => 'moder',
            'level' => 2,
        ],
        [
            'name' => 'Администратор',
            'slug' => 'admin',
            'level' => 3,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->integer('level')->default(1);
                $table->timestamps();
            });

            DB::table('roles')->insert(self::ROLES);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
