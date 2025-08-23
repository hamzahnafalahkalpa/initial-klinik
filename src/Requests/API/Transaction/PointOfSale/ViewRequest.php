<?php

namespace Projects\Klinik\Requests\API\Transaction\PointOfSale;

use Projects\Klinik\Requests\API\Transaction\Environment;

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