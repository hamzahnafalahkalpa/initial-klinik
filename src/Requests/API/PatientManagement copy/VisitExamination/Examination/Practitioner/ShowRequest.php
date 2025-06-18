<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination\Examination\Practitioner;

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