<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPatient;

use Projects\Klinik\Requests\API\PatientEmr\VisitPatient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};

class VisitPatientController extends EnvironmentController{

    public function index(ViewRequest $request){
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
