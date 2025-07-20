<?php

namespace Projects\Klinik\Requests\API\PatientEmr\EmergencyUnit\VisitExamination\Assessment;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class ShowRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
