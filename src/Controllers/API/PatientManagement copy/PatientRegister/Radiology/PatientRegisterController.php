<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\PatientRegister\Radiology;

use Projects\Klinik\Requests\PatientManagement\PatientRegister\{
    StoreRequest
};

class PatientRegisterController extends EnvironmentController
{
    public function store(StoreRequest $request){
        $medicService = $this->MedicServiceModel()->where("name","Radiologi")->first();
        request()->merge([
            "medic_service_id" => $medicService->service->getKey()
        ]);
        return $this->__visit_registration_schema->storeVisitRegistration();
    }

    public function getMedicService() {
    }
}
