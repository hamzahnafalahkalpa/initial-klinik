<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitPatient;

class ShowRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      // 'id' => ['required'], //lepas validasinya karena bisa jadi pake visit_code juga
    ]);
  }
}