<?php

namespace Projects\Klinik\Requests\API\Transaction\Refund;

use Projects\Klinik\Requests\API\Transaction\Refund\Environment;

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
