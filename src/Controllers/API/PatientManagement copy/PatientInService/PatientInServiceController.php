<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\PatientInService;

use Gii\ModuleMedicService\Enums\MedicServiceFlag;
use Projects\Klinik\Requests\PatientManagement\PatientInService\{
    ViewRequest,
};

class PatientInServiceController extends EnvironmentController
{
    public function index(ViewRequest $request)
    {
        return $this->__visit_patient_schema->viewVisitPatientaginate(MedicServiceFlag::MCU->value);
    }
}
