<?php

namespace Projects\Klinik\Requests\API\ItemManagement\SupplyChain\Purchasing;

use Hanafalah\LaravelSupport\Requests\FormRequest;
class ApprovalRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}