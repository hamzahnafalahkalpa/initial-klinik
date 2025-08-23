<?php

namespace Projects\Klinik\Controllers\API\PharmacyDepartment\PharmacySale;

use Projects\Klinik\Requests\API\PharmacyDepartment\PharmacySale\{
    ViewRequest, StoreRequest, ShowRequest, DeleteRequest
};

class PharmacySaleController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->getPharmacySalePaginate();
    }

    public function store(StoreRequest $request){
        return $this->storePharmacySale();
    }

    public function show(ShowRequest $request){
        return $this->showPharmacySale();
    }

    public function destroy(DeleteRequest $request){
        return $this->deletePharmacySale();
    }
}
