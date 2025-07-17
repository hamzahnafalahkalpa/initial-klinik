<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination;

class ShowRequest extends VisitEnvironment
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