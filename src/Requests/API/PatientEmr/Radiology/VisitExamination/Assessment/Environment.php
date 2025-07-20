<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Radiology\VisitExamination\Assessment;

use Hanafalah\LaravelSupport\Requests\FormRequest;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class Environment extends FormRequest
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
