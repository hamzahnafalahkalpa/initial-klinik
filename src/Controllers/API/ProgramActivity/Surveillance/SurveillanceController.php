<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Surveillance;

use Projects\Klinik\Requests\API\ProgramActivity\Surveillance\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
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

    public function show(ShowRequest $request){
        return $this->showSurveillance();
    }
}