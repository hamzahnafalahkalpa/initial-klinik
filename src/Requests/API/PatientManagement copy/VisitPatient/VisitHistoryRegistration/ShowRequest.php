<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitPatient\VisitHistoryRegistration;

class ShowRequest extends VisitHistoryRegistrationEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id'         => ['required'],
      'patient_id' => ['required',$this->idValidation(app(config('database.models.Patient')))]
    ]);
  }
}