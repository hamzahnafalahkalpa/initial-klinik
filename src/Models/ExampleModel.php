<?php

namespace Projects\Klinik\Models;

use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Projects\Klinik\Transformers\ExampleModel\{
    ViewExampleModel,
    ShowExampleModel
};
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ExampleModel extends BaseModel
{
    use HasUlids, HasProps, SoftDeletes;
    
    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    public $list = [
        'id',
        'name',
        'props',
    ];

    protected $casts = [
        'name' => 'string'
    ];

    

    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return [];
    }

    public function getViewResource(){
        return ViewExampleModel::class;
    }

    public function getShowResource(){
        return ShowExampleModel::class;
    }

    

    
}
