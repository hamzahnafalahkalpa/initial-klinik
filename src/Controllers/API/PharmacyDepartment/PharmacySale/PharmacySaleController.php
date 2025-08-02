<?php

namespace Projects\Klinik\Controllers\API\PharmacyDepartment\PharmacySale;

use Projects\Klinik\Requests\API\PharmacyDepartment\PharmacySale\{
    ViewRequest, StoreRequest, ShowRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;

class PharmacySaleController extends EnvironmentController
{
    protected function commonConditional($query){
        $query->when($this->isPerawat(),function($query){
            request()->merge([
                'search_medic_service_label' => 'INSTALASI FARMASI'
            ]);
        });
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function store(StoreRequest $request){
        $medic_service = $this->MedicServiceModel();
        $medic_service = (!isset(request()->medic_service_id))
            ? $medic_service->where('label','INSTALASI FARMASI')->firstOrFail()
            : $medic_service->findOrFail($request->medic_service_id);

        $service_cluster = $this->ServiceClusterModel();
        $service_cluster = (!isset(request()->service_cluster_id))
            ? $service_cluster->where('label','LINTAS KLUSTER')->firstOrFail()
            : $service_cluster->findOrFail($request->service_cluster_id);
        request()->merge([
            'medic_service_id'   => $medic_service->getKey(),
            'service_cluster_id' => $service_cluster->getKey()
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
