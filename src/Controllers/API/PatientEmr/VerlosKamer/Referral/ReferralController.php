<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VerlosKamer\Referral;

use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\Referral\EnvironmentController;
use Projects\Klinik\Requests\API\PatientEmr\VerlosKamer\Referral\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ReferralController extends EnvironmentController
{ 
    public function index(ViewRequest $request){
        return $this->getReferralPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showReferral();
    }

    public function store(StoreRequest $request){
        return $this->storeReferral();
    }

    public function delete(DeleteRequest $request){
        return $this->deleteReferral();
    }
}