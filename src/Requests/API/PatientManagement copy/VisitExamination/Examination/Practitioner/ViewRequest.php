<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitExamination\Examination\Practitioner;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
  }
}