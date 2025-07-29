<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitPustu\VisitExamination\Examination\Practitioner;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Examination\Practitioner\Environment;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
  }
}