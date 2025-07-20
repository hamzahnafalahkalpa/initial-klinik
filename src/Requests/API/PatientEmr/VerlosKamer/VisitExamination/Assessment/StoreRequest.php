<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VerlosKamer\VisitExamination\Assessment;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
