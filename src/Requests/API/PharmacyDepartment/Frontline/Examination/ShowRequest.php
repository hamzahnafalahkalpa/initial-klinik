<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Frontline\Examination;

use Projects\Klinik\Requests\API\VisitRegistration\VisitExamination\Examination\Practitioner\Environment;

class ShowRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
  }
}
