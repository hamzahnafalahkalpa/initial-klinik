<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Program\Surveillance;

use Projects\Klinik\Controllers\API\ProgramActivity\Surveillance\EnvironmentController;
use Projects\Klinik\Requests\API\ProgramActivity\Program\Surveillance\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class SurveillanceController extends EnvironmentController{
    protected function commonRequest(){
        request()->merge([
            'reference_type' => 'Program',
            'reference_id'   => request()->program_id
        ]);
    }

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