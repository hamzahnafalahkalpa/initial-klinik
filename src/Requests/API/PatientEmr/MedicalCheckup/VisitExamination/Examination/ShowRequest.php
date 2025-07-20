<?php

namespace Projects\Klinik\Requests\API\PatientEmr\MedicalCheckup\VisitExamination\Examination;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Examination\Environment;

class ShowRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
  }
}
