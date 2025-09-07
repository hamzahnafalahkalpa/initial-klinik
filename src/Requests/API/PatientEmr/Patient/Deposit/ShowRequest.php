<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\Deposit;

use Projects\Klinik\Requests\API\Transaction\Deposit\Environment;

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
