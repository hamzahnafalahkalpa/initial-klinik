<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;
use Hanafalah\ModuleProject\Models\Customer\Client;
use Hanafalah\ModuleProject\Models\Project\ProjectItem;

return new class extends Migration
{
    use NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.ProjectItem', ProjectItem::class));
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        if (!$this->isTableExists()) {
            Schema::create($table_name, function (Blueprint $table) {
                $table->ulid('id')->primary();
                $table->string('name',255)->nullable(false);
                $table->string('item_type',50)->nullable(false);
                $table->string('item_id',36)->nullable(false);
                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index(['item_type','item_id'],'project_itm');
            });

            Schema::table($table_name,function(Blueprint $table){
                $table->foreignIdFor($this->__table::class,'parent_id')
                      ->nullable()->after('id')->cascadeOnUpdate()
                      ->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->__table->getTable());
    }
};
