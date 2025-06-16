<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\PatientType;

use Projects\Klinik\Requests\PatientManagement\PatientType\{
    DeleteRequest,
    StoreRequest,
    ViewRequest
};

class PatientTypeController extends EnvironmentController{
    /**
     * Display a listing of the funding resource.
     *
     * @param ViewRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(ViewRequest $request){
        return $this->__patient_type_schema->viewPatientTypeList();
    }

    public function store(StoreRequest $request){
        return $this->__patient_type_schema->storePatientType();
    }

    public function destroy(DeleteRequest $request){
        return $this->__patient_type_schema->deletePatientType();
    }
}
