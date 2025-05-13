<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;
use Hanafalah\ModuleRencanaAnggaran\Models\Anggaran\Anggaran;
use Hanafalah\ModuleRencanaAnggaran\Models\Anggaran\AnggaranItem;
use Hanafalah\ModuleRencanaAnggaran\Models\Anggaran\AnggaranStuff;

return new class extends Migration
{
    use NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.AnggaranItem', AnggaranItem::class));
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        if (!$this->isTableExists()) {
            Schema::create($table_name, function (Blueprint $table) {
                $anggaran = app(config('database.models.Anggaran',Anggaran::class));
                $anggaran_stuff = app(config('database.models.AnggaranStuff',AnggaranStuff::class));

                $table->ulid('id')->primary();
                $table->foreignIdFor($anggaran::class)
                      ->nullable(false)->index()->constrained()->cascadeOnDelete()
                      ->cascadeOnUpdate();

                $table->foreignIdFor($anggaran_stuff::class,'unit_id')
                      ->nullable()->index()->constrained()->cascadeOnDelete()
                      ->cascadeOnUpdate();

                $table->string('item_type',50)->nullable(true);
                $table->string('item_id',36)->nullable(true);

                $table->string('name',255)->nullable(false);
                $table->decimal('volume',8,2)->nullable();
                $table->decimal('price',10,2)->nullable();
                $table->decimal('total_price',14,2)->nullable();
                $table->text('note')->nullable();
                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index(['item_type','item_id'],'rap_item');
            });

            Schema::table($table_name, function (Blueprint $table) {
                $table->foreignIdFor(get_class($this->__table), 'parent_id')
                      ->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
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
