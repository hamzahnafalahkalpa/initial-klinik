<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;
use Hanafalah\ModuleProject\Models\Customer\Client;
use Hanafalah\ModuleProject\Models\Project\Project;

return new class extends Migration
{
    use NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.Project', Project::class));
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        if (!$this->isTableExists()) {
            Schema::create($table_name, function (Blueprint $table) {
                $client = app(config('database.models.Client',Client::class));

                $table->id();
                $table->string('project_code',50)->nullable();
                $table->string('name',255)->nullable(false);
                $table->foreignIdFor($client::class)->nullable(false)
                        ->index()->constrained()->restrictOnDelete()->cascadeOnUpdate();
                $table->unsignedBigInteger('sph_price')->comment('Surat Penawaran Harga')->nullable();
                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
