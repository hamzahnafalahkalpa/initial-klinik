<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient;

use Zahzah\ModulePatient\Enums\FamilyRelationship\Role;
use Projects\Klinik\Requests\PatientEmr\Patient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};

class PatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        $this->recombineRequest();
        return $this->__patient_schema->viewPatientList();
    }

    public function store(StoreRequest $request){
        return $this->__patient_schema->storePatient();
    }

    public function show(ShowRequest $request){
        return $this->__patient_schema->showPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__patient_schema->deletePatient();
    }
}
