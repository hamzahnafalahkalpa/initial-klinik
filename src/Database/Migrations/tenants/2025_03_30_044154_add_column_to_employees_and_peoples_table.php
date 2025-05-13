<?php

use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;
use Hanafalah\ModuleEmployee\Models\Employee\Employee;
use Hanafalah\ModulePeople\Models\People\People;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use NowYouSeeMe;

    private $__table_employee, $__table_people;

    public function __construct()
    {
        $this->__table_employee = app(config('database.models.Employee',Employee::class));
        $this->__table_people = app(config('database.models.People',People::class));
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn($this->__table_employee->getTable(),'uuid')){
            Schema::table($this->__table_employee->getTable(), function (Blueprint $table) {
                $table->string('uuid', 36)->nullable()->after('id');
            });
        }
        if (!Schema::hasColumn($this->__table_people->getTable(),'uuid')){
            Schema::table($this->__table_people->getTable(), function (Blueprint $table) {
                $table->string('uuid', 36)->nullable()->after('id');
            });
        }
        DB::unprepared("
            UPDATE employees 
            JOIN user_references as ur on ur.reference_id = employees.id and ur.reference_type = 'Employee'
            SET employees.uuid = ur.uuid;

            UPDATE peoples 
            JOIN user_references as ur on ur.reference_id = peoples.id and ur.reference_type = 'People'
            SET peoples.uuid = ur.uuid;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn($this->__table_employee->getTable(),'uuid')){
            Schema::table($this->__table_employee->getTable(), function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
        if (Schema::hasColumn($this->__table_people->getTable(),'uuid')){
            Schema::table($this->__table_people->getTable(), function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
};
