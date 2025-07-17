<?php

namespace Projects\Klinik\Requests\API\ItemManagement\Inventory\StuffSupply;

use Hanafalah\LaravelSupport\Requests\FormRequest;
class DeleteRequest extends FormRequest
{
  protected $__entity = 'StuffSupply';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}