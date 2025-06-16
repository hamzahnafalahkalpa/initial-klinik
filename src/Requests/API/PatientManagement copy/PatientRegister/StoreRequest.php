<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientRegister;

class StoreRequest extends PatientRegisterEnvironment
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
        "patient_id"        => ["nullable"],
        "medic_service_id"  => ["nullable"],
        "payer_id"          => ["nullable"], // modelHasOrganization
        "agent_id"          => ["nullable"], // modelHasOrganization
        "occupation_id"     => ["nullable"], // modelHasRelation
        "mcu_category_id"   => ["nullable"], // modelHasService
        "mcu_package_id"    => ["nullable"], // modelHasService
    ];
  }
}
