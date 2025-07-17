<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\PatientRegister\Radiology;

use Projects\Klinik\Requests\PatientEmr\PatientRegister\{
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
