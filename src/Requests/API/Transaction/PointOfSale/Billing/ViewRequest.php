<?php

namespace Projects\Klinik\Requests\API\Transaction\PointOfSale\Billing;

use Projects\Klinik\Requests\API\Transaction\Billing\Environment;

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