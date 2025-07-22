<?php

namespace Projects\Klinik\Transformers\ExampleModel;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewExampleModel extends ApiResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $arr = [
      "id" => $this->id,
      "name" => $this->name,
      "employee" => $this->relationValidation('employee', function () {
        return $this->employee->toViewApi()->resolve();
      },$this->prop_employee)
    ];
    return $arr;
  }
}
