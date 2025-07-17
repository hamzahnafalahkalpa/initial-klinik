<?php

namespace Projects\Klinik\Controllers\API\PatientEmr;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination;
use Hanafalah\ModulePatient\Contracts\Schemas\{
    VisitExamination,
    VisitPatient,
    VisitRegistration
};
use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected VisitExamination $__visit_examination_schema,
        protected VisitPatient $__visit_patient_schema,
        protected VisitRegistration $__visit_registration_schema,
        protected Examination $__examination_schema
    )
    {
        parent::__construct();   
        $this->userAttempt();
    }

    protected function commonConditional($query){

    }

    protected function commonRequest(){
        
    }

    protected function isEmployee(): bool{
        return isset($this->global_employee);
    }

    protected function isDoctor(){
        return $this->isEmployee() && isset($this->global_employee->profession) && $this->global_employee->profession['label'] == 'Doctor';
    }

    protected function isPerawat(){
        return $this->isEmployee() && isset($this->global_employee->profession) && $this->global_employee->profession['label'] == 'Perawat';
    }

    protected function getMedicServiceFromEmployee(){
        if (isset($this->global_employee)){
            $profession = $this->global_employee->profession;
            if (isset($profession) && $profession->label == 'Nurse'){
                $rooms = $this->global_employee->rooms;
                $medic_service_id = [];
                foreach ($rooms as $room) {
                    if (isset($room)){
                        $model_has_service = $room->modelHasService()->first();
                        if (isset($model_has_service)) $medic_service_id[] = $model_has_service->service_id;
                    }
                }
            }else{
                $room = $this->global_employee->room;
                if (isset($room)){
                    $model_has_service = $room->modelHasService()->first();
                    if (isset($model_has_service)) $medic_service_id = $model_has_service->service_id;
                }
            }
        }
        return $medic_service_id ?? null;
    }
}
