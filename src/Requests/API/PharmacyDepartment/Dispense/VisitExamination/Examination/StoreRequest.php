<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Dispense\VisitExamination\Examination;

use Projects\Klinik\Requests\API\VisitRegistration\VisitExamination\Examination\Practitioner\Environment;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
