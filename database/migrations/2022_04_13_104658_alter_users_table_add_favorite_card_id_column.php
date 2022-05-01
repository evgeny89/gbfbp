<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddFavoriteCardIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'favorite_card_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('favorite_card_id')->nullable();

                $table->foreign('favorite_card_id')->references('id')->on('payment_cards');
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
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'favorite_card_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_favorite_card_id_foreign');

                $table->dropColumn('favorite_card_id');
            });
        }
    }
}
