<?php

namespace Projects\Klinik\Requests\API\Transaction\Refund;

use Projects\Klinik\Requests\API\Transaction\Refund\Environment;

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