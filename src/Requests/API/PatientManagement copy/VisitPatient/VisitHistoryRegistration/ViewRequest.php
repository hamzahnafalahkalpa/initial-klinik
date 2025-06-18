<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitPatient\VisitHistoryRegistration;

class ViewRequest extends VisitHistoryRegistrationEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [
      'patient_id' => ['required',$this->idValidation('Patient')]
    ];
  }
}