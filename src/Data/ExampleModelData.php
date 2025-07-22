<?php

namespace Projects\Klinik\Data;

use Hanafalah\LaravelSupport\Supports\Data;
use Projects\Klinik\Contracts\Data\ExampleModelData as DataExampleModelData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class ExampleModelData extends Data implements DataExampleModelData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('name')]
    #[MapName('name')]
    public string $name;

    #[MapInputName('employee_id')]
    #[MapName('employee_id')]
    public string $employee_id;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function before(array &$attributes){

    }

    public static function after(self $data): self{
        $new = self::new();
        $props = &$data->props;

        $props['prop_employee'] = $new->EmployeeModel()->findOrFail($data->employee_id)->toViewApi()->resolve();
        return $data;
    }
}