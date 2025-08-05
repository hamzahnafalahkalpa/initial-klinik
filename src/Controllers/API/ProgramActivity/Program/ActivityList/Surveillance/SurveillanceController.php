<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Program\ActivityList\Surveillance;

use Projects\Klinik\Controllers\API\ProgramActivity\ActivityList\Surveillance\EnvironmentController;
use Projects\Klinik\Requests\API\ProgramActivity\Program\ActivityList\Surveillance\{
    ViewRequest, StoreRequest, DeleteRequest
};

class SurveillanceController extends EnvironmentController{

    public function index(ViewRequest $request){
        return $this->getSurveillancePaginate();
    }

    public function store(StoreRequest $request){
        return $this->storeSurveillance();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteSurveillance();
    }

    public function show(ViewRequest $request){
        return $this->showSurveillance();
    }
}