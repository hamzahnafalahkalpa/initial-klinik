<?php

namespace Projects\Klinik\Requests\API\ItemManagement\SupplyChain\Purchasing;

use Hanafalah\LaravelSupport\Requests\FormRequest;

class ShowRequest extends FormRequest
{
  protected $__entity = 'Purchasing';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}
