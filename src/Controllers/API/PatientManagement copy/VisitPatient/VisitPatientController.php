<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitPatient;

use Projects\Klinik\Requests\PatientManagement\VisitPatient\{
    ShowRequest,ViewRequest,
    DeleteRequest, StoreRequest
};

class VisitPatientController extends EnvironmentController
{
    public function index(ViewRequest $request){
        if (isset(request()->search_value)){
            $value = request()->search_value;
            request()->merge([
                'search_name'           => $value,
                'search_dob'            => $value,
                'search_created_at'     => $value,
                'search_nik'            => $value,
                'search_medical_record' => $value,
                'search_value'          => null
            ]);
        }
        return $this->__visit_patient_schema->viewVisitPatientPaginate();
    }

    public function store(StoreRequest $request){
        return $this->__visit_patient_schema->storeVisitPatient();
    }

    public function show(ShowRequest $request){
        return $this->__visit_patient_schema->showVisitPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__visit_patient_schema->deleteVisitPatient();
    }
}
