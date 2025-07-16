<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\Practitioner;

use Illuminate\Validation\Rule;

class ShowRequest extends Environment
{

  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
    // return $this->setRules([
    // ]);
  }
}