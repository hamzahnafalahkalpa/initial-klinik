<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitPatient\VisitHistoryRegistration;

class UpdateRequest extends VisitHistoryRegistrationEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id'         => ['required'],
      'patient_id' => ['required',$this->idValidation('Patient')],
      'type'       => ['requied','in:cancel']
    ]);
  }
}