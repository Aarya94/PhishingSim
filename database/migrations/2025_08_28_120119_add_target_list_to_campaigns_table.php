<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->text('target_list')->nullable()->after('phishing_link'); // store comma-separated emails
            $table->string('status')->default('draft')->after('target_list'); // draft/completed
        });
    }

    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn(['target_list', 'status']);
        });
    }
};
