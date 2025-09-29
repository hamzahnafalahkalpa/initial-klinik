<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient;

use Projects\Klinik\Requests\API\PatientEmr\Patient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};

class PatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        $this->recombineRequest();
        return $this->__schema->viewPatientPaginate();
    }

    public function store(StoreRequest $request){
        $possibleTypes = ['people'];
        $reference = null;
        $referenceType = null;

        foreach ($possibleTypes as $type) {
            if (request()->filled($type)) {
                $reference = request()->input($type);
                $referenceType = $type;
                break;
            }
        }

        $data = array_fill_keys($possibleTypes, null);
        if (isset($reference)) $data['reference'] = $reference;
        $data['reference_type'] = $referenceType;

        if (isset(request()->visit_examination)){
            $visit_examination = request()->visit_examination;
            $patient_type_service_id = $visit_examination['patient_type_service_id'] ?? $this->PatientTypeServiceModel()->where('label','UMUM')->firstOrFail()->getKey();
            $medic_service_id = $visit_examination['medic_service_id'] ?? $this->MedicServiceModel()->where('label','UMUM')->firstOrFail()->getKey();
            $visit_examination['visit_registration'] ??= [
                "medic_service_id"        => $medic_service_id,
                "patient_type_service_id" => $patient_type_service_id
            ];
            unset($visit_examination['medic_service_id']);
            unset($visit_examination['patient_type_service_id']);
            request()->merge(['visit_examination' => $visit_examination]);
        }

        request()->merge($data);
        return $this->__schema->storePatient();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePatient();
    }
}
