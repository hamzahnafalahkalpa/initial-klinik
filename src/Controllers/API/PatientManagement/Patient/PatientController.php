<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\Patient;

use Zahzah\ModulePatient\Enums\FamilyRelationship\Role;
use Projects\Klinik\Requests\PatientManagement\Patient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};

class PatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        $this->recombineRequest();
        return $this->__schema->viewPatientPaginate();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storePatient();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePatient();
    }
}
