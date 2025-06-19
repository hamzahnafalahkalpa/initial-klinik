<?php

namespace Projects\Klinik\Models\ModulePatient\Patient;

use Hanafalah\ModulePatient\Models\Patient\Patient as PatientPatient;
use Hanafalah\ModulePayment\Concerns\HasConsument;
use Projects\Klinik\Transformers\Patient\{ViewPatient,ShowPatient};

class Patient extends PatientPatient
{
    use HasConsument;

    public function getViewResource(){return ViewPatient::class;}
    public function getShowResource(){return ShowPatient::class;}
}
