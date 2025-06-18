<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination\Examination;

class UpdateRequest extends ExaminationEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
        'visit_examination_id' => ['required'],
        'type'                 => ['required','in:commit, closed-emr-session'],
    ]);
  }
}