<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPosyandu;

use Projects\Klinik\Requests\API\PatientEmr\VisitPosyandu\{
    ViewRequest, StoreRequest, ShowRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;

class VisitPosyanduController extends EnvironmentController
{
    protected function commonRequest(){
        request()->merge([
            'search_medic_service_label' => 'POSYANDU'
        ]);
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function store(StoreRequest $request){
        $medic_service = $this->MedicServiceModel();
        $medic_service = (!isset(request()->medic_service_id))
            ? $medic_service->where('label','POSYANDU')->firstOrFail()
            : $medic_service->findOrFail($request->medic_service_id);

        request()->merge([
            'medic_service_id' => $medic_service->getKey()
        ]);
        return $this->storeVisitRegistration();
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
