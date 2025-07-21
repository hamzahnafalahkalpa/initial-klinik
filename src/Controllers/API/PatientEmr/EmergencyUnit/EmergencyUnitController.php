<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\EmergencyUnit;

use Projects\Klinik\Requests\API\PatientEmr\EmergencyUnit\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;

class EmergencyUnitController extends EnvironmentController
{
    protected function commonRequest(){
        $medic_service_id = request()->medic_service_id ?? $this->MedicServiceModel()->where('label','UGD')->firstOrFail()->getKey();
        request()->merge([
            'search_medic_service_label' => 'UGD',
            'medic_service_id' => $medic_service_id
        ]);
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function store(StoreRequest $request){
        $visit_patient = request()->visit_patient;
        if (isset($visit_patient->patient)){
            $patient = &$visit_patient->patient;
            $patient->reference = $patient->people;
            $patient->people = null;
            request()->merge(['visit_patient' => $visit_patient]);
        }
        return $this->storeVisitRegistration();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
