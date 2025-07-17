<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient;

use Projects\Klinik\Requests\API\PatientEmr\VisitPatient\EnvironmentRequest;

class ViewRequest extends EnvironmentRequest
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