<?php

namespace Projects\Klinik\Contracts\Schemas;

use Projects\Klinik\Contracts\Data\ExampleModelData;
//use Projects\Klinik\Contracts\Data\ExampleModelUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Projects\Klinik\Schemas\ExampleModel
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateExampleModel(?ExampleModelData $example_model_dto = null)
 * @method Model prepareUpdateExampleModel(ExampleModelData $example_model_dto)
 * @method bool deleteExampleModel()
 * @method bool prepareDeleteExampleModel(? array $attributes = null)
 * @method mixed getExampleModel()
 * @method ?Model prepareShowExampleModel(?Model $model = null, ?array $attributes = null)
 * @method array showExampleModel(?Model $model = null)
 * @method Collection prepareViewExampleModelList()
 * @method array viewExampleModelList()
 * @method LengthAwarePaginator prepareViewExampleModelPaginate(PaginateData $paginate_dto)
 * @method array viewExampleModelPaginate(?PaginateData $paginate_dto = null)
 * @method array storeExampleModel(?ExampleModelData $example_model_dto = null)
 * @method Collection prepareStoreMultipleExampleModel(array $datas)
 * @method array storeMultipleExampleModel(array $datas)
 */

interface ExampleModel extends DataManagement
{
    public function prepareStoreExampleModel(ExampleModelData $example_model_dto): Model;
}