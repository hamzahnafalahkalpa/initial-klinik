<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Assessment;

class ShowRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
