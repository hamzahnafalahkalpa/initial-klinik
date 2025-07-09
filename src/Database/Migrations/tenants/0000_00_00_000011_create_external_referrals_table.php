<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\ModulePatient\Models\EMR\ExternalReferral;
use Hanafalah\ModulePatient\Models\EMR\VisitPatient;

return new class extends Migration
{
    use Hanafalah\MicroTenant\Concerns\Tenant\NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.ExternalReferral', ExternalReferral::class));
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        $this->isNotTableExists(function() use ($table_name){
            Schema::create($table_name, function (Blueprint $table) {
                $table->ulid('id')->primary();
                $table->date("date");
                $table->string("doctor_name")->nullable();
                $table->string("phone")->nullable();
                $table->string("facility_name")->nullable();
                $table->string("unit_name")->nullable();
                $table->string("initial_diagnose")->nullable();
                $table->string("primary_diagnose")->nullable();
                $table->string("note")->nullable();
                $table->json('props')->nullable();
                $table->softDeletes();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->__table->getTable());
    }
};
