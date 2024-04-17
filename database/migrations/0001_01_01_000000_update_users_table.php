<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public $table = 'users';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table($this->table, function (Blueprint $table) {
            // agregar un campo
            $table->boolean('is_active')->nullable()->default(true)->after('password');
            $table->string('profile_photo_path', 128)->nullable()->default('images/avatars/default.png')->after('password');
            // modificar campos
            // * para alterar campos hay que ejecutar antes
            // * composer require doctrine/dbal
            // $table->string('name', 50)->nullable()->change();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('profile_photo_path');
        });

        Schema::enableForeignKeyConstraints();
    }
};
