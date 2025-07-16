<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitPatient;

use Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitPatient\EnvironmentController;

class VisitPatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        return $this->__schema->conditionals(function($query){
            $query->where('patient_id',request()->patient_id);
        })->viewVisitPatientPaginate();
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
