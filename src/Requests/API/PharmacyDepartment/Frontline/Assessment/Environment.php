<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Frontline\Assessment;

use Hanafalah\LaravelSupport\Requests\FormRequest;

use Projects\Klinik\Requests\API\PharmacyDepartment\VisitExamination\EnvironmentRequest;

class Environment extends FormRequest
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
