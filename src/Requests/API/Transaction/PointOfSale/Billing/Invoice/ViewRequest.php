<?php

namespace Projects\Klinik\Requests\API\Transaction\PointOfSale\Billing\Invoice;

use Projects\Klinik\Requests\API\Transaction\Invoice\Environment;

class ViewRequest extends Environment
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
    ];
  }
}