<?php

namespace Projects\Klinik\Requests\API\Transaction\PointOfSale;

use Projects\Klinik\Requests\API\Transaction\Environment;

class ShowRequest extends Environment
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
