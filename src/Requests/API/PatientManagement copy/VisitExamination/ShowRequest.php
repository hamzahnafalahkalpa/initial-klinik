<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination;

class ShowRequest extends VisitExaminationEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id' => ['required']
    ]);
  }
}