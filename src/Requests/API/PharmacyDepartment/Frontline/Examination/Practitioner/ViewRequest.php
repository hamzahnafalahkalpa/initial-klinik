<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Frontline\Examination\Practitioner;

use Projects\Klinik\Requests\API\VisitRegistration\VisitExamination\Examination\Practitioner\Environment;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
  }
}