<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\NurseStation;

use Projects\Klinik\Requests\API\PatientEmr\NurseStation\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;

class NurseStationController extends EnvironmentController
{
    protected function commonRequest(){
        $visit_patient = request()->visit_patient;
        $merges = [
            'search_medic_service_id=' => $this->getMedicServiceFromEmployee(),
        ];
        if (isset($visit_patient)){
            $merges['visit_patient_type'] = 'VisitPatient';
        }
        request()->merge($merges);
    }

    protected function commonConditional($query){
        $query->when(!$this->isPerawat(),function($query){
            $query->whereRaw('false');
        });
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function store(StoreRequest $request){
        return $this->storeVisitRegistration();
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
