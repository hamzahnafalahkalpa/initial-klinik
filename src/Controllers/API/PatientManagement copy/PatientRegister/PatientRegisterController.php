<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\PatientRegister;

use Projects\Klinik\Requests\PatientEmr\PatientRegister\{
    ShowRequest,
    DeleteRequest,
    StoreRequest
};
use Zahzah\ModulePatient\Enums\VisitPatient\VisitStatus;
use Zahzah\ModulePatient\Enums\VisitRegistration\RegistrationStatus;
use Zahzah\ModulePatient\Resources\VisitRegistration\ShowVisitRegistration;
use Zahzah\ModulePatient\Resources\VisitPatient\ViewVisitPatient;
class PatientRegisterController extends EnvironmentController
{
    public function index(){
        $visitPatients = $this->__visit_patient_schema->booting()->getVisitPatients();
        return $this->retransform($visitPatients, function ($visit) {
            return new ViewVisitPatient($visit);
        });
    }

    public function store(StoreRequest $request){
        return $this->transaction(function () use($request) {
            $visit_patient = [
                'patient_id' => $request->patient_id,
                'visited_at' => now(),
                'status' => VisitStatus::ACTIVE
            ];
            $visitPatient = $this->__visit_patient_schema->booting()->add($visit_patient)->getModel();
            $visitPatient->modelHasOrganization()->createMany([
                ['organization_id' => $request->payer_id],
                ['organization_id' => $request->agent_id],
            ]);
            $visit_registration = [
                'visit_patient_id' => $visitPatient->id,
                'medic_service_id' => $request->medic_service_id,
                'patient_type_id' => $request->patient_type_id,
                'status' => RegistrationStatus::DRAFT
            ];

            $visitRegistration = $this->__visit_registration_schema->booting()->add($visit_registration)->getModel();
            $medicService = $this->MedicServiceModel()->find($request->medic_service_id)->name;
            $visitRegistration->medic_service = $medicService;
            $visitRegistration->save();

            $visitRegistration->modelHasService()->createMany([
                ['service_id' => $this->ServiceModel()->where('reference_type', $this->McuCategoryModel()->getMorphClass())->where('reference_id', request()->mcu_category_id)->first()->getKey()],
                ['service_id' => $this->ServiceItemModel()->find(request()->mcu_package_id)->reference_id]
            ]);
            $visitRegistration = $this->retransform($visitRegistration, function ($registration) {
                return new ShowVisitRegistration($registration);
            });
            return $visitRegistration;
        });
    }
}
