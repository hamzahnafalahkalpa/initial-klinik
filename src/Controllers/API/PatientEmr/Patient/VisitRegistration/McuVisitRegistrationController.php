<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitRegistration;

use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;
use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
    ViewRequest
};

class McuVisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate(function($query){
            if ($this->isPerawat() || $this->isDoctor()){
                $query->whereHas('childs',function($query){
                    $is_false = ($medic_service = $this->getMedicServiceFromEmployee()) !== null;
                    request()->merge(['search_medic_service_id' => $medic_service]);
                    if ($is_false) $query->whereRaw('FALSE');
                });
            }
        });
    }
}
