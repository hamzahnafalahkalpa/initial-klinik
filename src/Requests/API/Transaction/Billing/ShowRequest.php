<?php

namespace Projects\Klinik\Requests\API\Transaction\Billing;

use Projects\Klinik\Requests\API\Transaction\Billing\Environment;

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
