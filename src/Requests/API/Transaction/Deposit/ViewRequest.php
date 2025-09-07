<?php

namespace Projects\Klinik\Requests\API\Transaction\Deposit;

use Projects\Klinik\Requests\API\Transaction\Deposit\Environment;

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