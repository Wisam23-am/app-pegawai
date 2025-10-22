<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/...._add_foreign_keys_to_employees_table.php

    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Menambahkan kolom baru setelah kolom 'tanggal_masuk'
            $table->unsignedBigInteger('departemen_id')->after('tanggal_masuk');
            $table->unsignedBigInteger('jabatan_id')->after('departemen_id');

            // Membuat relasi (foreign key)
            $table->foreign('departemen_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Hapus relasi terlebih dahulu
            $table->dropForeign(['departemen_id']);
            $table->dropForeign(['jabatan_id']);

            // Hapus kolom
            $table->dropColumn(['departemen_id', 'jabatan_id']);
        });
    }
};
