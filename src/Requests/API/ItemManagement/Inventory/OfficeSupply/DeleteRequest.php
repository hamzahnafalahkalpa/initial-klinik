<?php

namespace Projects\Klinik\Requests\API\ItemManagement\Inventory\OfficeSupply;

use Hanafalah\LaravelSupport\Requests\FormRequest;
class DeleteRequest extends FormRequest
{
  protected $__entity = 'OfficeSupply';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}