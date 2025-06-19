<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitPatient;

use Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitPatient\EnvironmentController;

class VisitPatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        // request()->merge([
        //     'search_medical_record'  => request()->search_value,
        //     'search_name'            => request()->search_value,
        //     'search_nik'             => request()->search_value,
        //     'search_crew_id'         => request()->search_value,
        //     'search_dob'             => request()->search_value,
        //     'search_consument_name'  => request()->search_value,
        //     'search_consument_phone' => request()->search_value,
        //     'search_value'           => null
        // ]);
        return $this->__schema->viewVisitPatientPaginate();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeVisitPatient();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showVisitPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteVisitPatient();
    }
}
