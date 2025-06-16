<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\PatientRegister\MCU;

use Projects\Klinik\Jobs\SatuSehat\EncounterJob;
use Projects\Klinik\Requests\PatientManagement\PatientRegister\{
    StoreRequest
};
class PatientRegisterController extends EnvironmentController
{
    public function store(StoreRequest $request){
        $data = $this->__mcu_visit_schema->storeMcuVisitRegistration();
        $patient = $this->PatientModel()->find($data['visit_patient']['patient']['id']);
        dispatch(new EncounterJob($data, $patient, "MCU"));
        return $data;
    }
}
