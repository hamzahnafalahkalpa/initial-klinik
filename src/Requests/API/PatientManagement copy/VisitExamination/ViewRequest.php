<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination;

class ViewRequest extends VisitExaminationEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id' => ['nullable']
    ]);
  }
}