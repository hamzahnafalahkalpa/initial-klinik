<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination\Examination;

class ViewRequest extends ExaminationEnvironment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [
      'visit_examination_id' => ['required',$this->idValidation('VisitExamination')]
    ];
  }
}
