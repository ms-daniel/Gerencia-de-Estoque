<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->integer('quantity')->after('some_existing_column')->default(0);
            $table->timestamp('manufactured')->nullable();
            $table->timestamp('validity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('manufactured');
            $table->dropColumn('validity');
        });
    }
};
