<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Frontline\Assessment;

use Projects\Klinik\Requests\API\PharmacyDepartment\VisitExamination\EnvironmentRequest;

class ShowRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
