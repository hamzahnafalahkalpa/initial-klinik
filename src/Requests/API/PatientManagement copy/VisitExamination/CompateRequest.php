<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitExamination;

class CompateRequest extends VisitExaminationEnvironment
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
