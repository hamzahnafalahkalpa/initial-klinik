<?php

namespace Projects\Klinik\Requests\API\ItemManagement\SupplyChain\PurchaseOrder;

use Hanafalah\LaravelSupport\Requests\FormRequest;

class ShowRequest extends FormRequest
{
  protected $__entity = 'PurchaseOrder';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}
