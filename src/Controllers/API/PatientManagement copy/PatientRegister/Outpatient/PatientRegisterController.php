<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\PatientRegister\Outpatient;

use Gii\ModuleMedicService\Models\MedicService;
use Gii\ModuleService\Resources\ViewService;
use Projects\Klinik\Requests\PatientManagement\PatientRegister\{
    StoreRequest
};
use Zahzah\ModulePatient\Resources\VisitRegistration\ViewVisitRegistration;

class PatientRegisterController extends EnvironmentController
{
    public function store(StoreRequest $request){
        return $this->__visit_registration_schema->storeVisitRegistration();
    }

    public function getMedicService() {
        $services =  $this->ServiceModel()
                           ->where("reference_type",$this->MedicServiceModel()->getMorphClass())
                           ->whereNull("parent_id")
                           ->with(["childs" => function($q) {
                               $q->whereNotIn("name", ["Klinik Kesehatan Ibu dan Anak (KIA)","Lansia"]);
                           },"reference"])
                           ->get();
        $services = $services->first(function ($service) {
            return $service->reference->name == "Rawat Jalan";
        });

        $services = $this->retransform($services, function ($medicService) {
            return new ViewService($medicService);
        });
        return collect([$services]);
    }
}
