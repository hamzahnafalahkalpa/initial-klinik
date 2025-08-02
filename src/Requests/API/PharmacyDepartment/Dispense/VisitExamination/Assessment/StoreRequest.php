<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Dispense\VisitExamination\Assessment;

use Projects\Klinik\Requests\API\PharmacyDepartment\VisitExamination\EnvironmentRequest;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
