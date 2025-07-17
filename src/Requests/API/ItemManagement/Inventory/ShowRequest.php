<?php

namespace Projects\Klinik\Requests\API\ItemManagement\Inventory;

use Hanafalah\LaravelSupport\Requests\FormRequest;

class ShowRequest extends FormRequest
{
  protected $__entity = 'Inventory';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}
