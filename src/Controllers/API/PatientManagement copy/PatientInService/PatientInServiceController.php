<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\PatientInService;

use Gii\ModuleMedicService\Enums\MedicServiceFlag;
use Projects\Klinik\Requests\PatientEmr\PatientInService\{
    ViewRequest,
};

class PatientInServiceController extends EnvironmentController
{
    public function index(ViewRequest $request)
    {
        return $this->__visit_patient_schema->viewVisitPatientaginate(MedicServiceFlag::MCU->value);
    }
}
