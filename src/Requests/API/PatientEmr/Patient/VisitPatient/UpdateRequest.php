<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient;

use Projects\Klinik\Requests\API\PatientEmr\VisitPatient\EnvironmentRequest;

class UpdateRequest extends EnvironmentRequest
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