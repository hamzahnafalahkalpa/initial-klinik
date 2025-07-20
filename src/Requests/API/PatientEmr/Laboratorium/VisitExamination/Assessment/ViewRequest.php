<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Laboratorium\VisitExamination\Assessment;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
