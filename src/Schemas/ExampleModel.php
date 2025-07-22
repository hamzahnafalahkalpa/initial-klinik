<?php

namespace Projects\Klinik\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Projects\Klinik\{
    Supports\BaseKlinik
};
use Projects\Klinik\Contracts\Schemas\ExampleModel as ContractsExampleModel;
use Projects\Klinik\Contracts\Data\ExampleModelData;

class ExampleModel extends BaseKlinik implements ContractsExampleModel
{
    protected string $__entity = 'ExampleModel';
    public $example_model_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'example_model',
            'tags'     => ['example_model', 'example_model-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreExampleModel(ExampleModelData $example_model_dto): Model{
        $add = [
            'name' => $example_model_dto->name
        ];
        $guard  = ['id' => $example_model_dto->id];
        $create = [$guard, $add];
        // if (isset($example_model_dto->id)){
        //     $guard  = ['id' => $example_model_dto->id];
        //     $create = [$guard, $add];
        // }else{
        //     $create = [$add];
        // }

        $example_model = $this->usingEntity()->updateOrCreate(...$create);
        $this->fillingProps($example_model,$example_model_dto->props);
        $example_model->save();
        return $this->example_model_model = $example_model;
    }
}