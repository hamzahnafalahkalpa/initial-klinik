<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\Practitioner;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Examination\Practitioner\Environment;

class DeleteRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [
      'id' => ['nullable']
    ];
  }
}