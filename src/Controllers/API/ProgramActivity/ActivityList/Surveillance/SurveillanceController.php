<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Surveillance;

use Projects\Klinik\Controllers\API\ProgramActivity\Surveillance\EnvironmentController;
use Projects\Klinik\Requests\API\ProgramActivity\Surveillance\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class SurveillanceController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->__schema->viewSurveillancePaginate();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeSurveillance();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteSurveillance();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showSurveillance();
    }
}