<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\PharmacySale\VisitExamination\Examination;

use Projects\Klinik\Requests\API\VisitRegistration\VisitExamination\Examination\Practitioner\Environment;

class ViewRequest extends Environment
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
