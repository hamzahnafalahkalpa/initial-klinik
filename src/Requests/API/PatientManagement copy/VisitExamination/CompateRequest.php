<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination;

class CompateRequest extends VisitEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'visit_examination_id' => ['required']
    ]);
  }
}
