<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration;

use Projects\Klinik\Requests\API\PatientEmr\VisitPatient\EnvironmentRequest;

class DeleteRequest extends EnvironmentRequest
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