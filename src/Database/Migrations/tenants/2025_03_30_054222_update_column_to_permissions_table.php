<?php

use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use NowYouSeeMe;

    private $__table;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("ALTER TABLE `permissions`
            CHANGE `type` `type` enum('MENU','MODULE','PERMISSION','NAVIGATION') NOT NULL DEFAULT 'PERMISSION' COMMENT '';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
