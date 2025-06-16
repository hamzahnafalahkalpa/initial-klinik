<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\PatientRegister;

use Aibnuhibban\ModuleMcu\Contracts\McuVisitRegistration;
use Gii\ModuleOrganization\Schemas\ModelHasOrganization;
use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;
use Projects\Klinik\Schemas\Service\Service;
use Zahzah\ModulePatient\Schemas\{
    PractitionerEvaluation,
    VisitRegistration,
    VisitExamination,
    VisitPatient,
    Patient
};

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected Patient $__patient_schema,
        protected VisitPatient $__visit_patient_schema,
        protected VisitRegistration $__visit_registration_schema,
        protected McuVisitRegistration $__mcu_visit_schema,
        protected VisitExamination $__visit_examination_schema,
        protected PractitionerEvaluation $__practitioner_evaluation_schema,
        protected Service $__service_schema,
        protected ModelHasOrganization  $__model_has_organization
    ){

    }
}
