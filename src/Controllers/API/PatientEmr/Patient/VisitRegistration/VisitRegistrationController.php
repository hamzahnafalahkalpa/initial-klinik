<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitRegistration;

use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;
use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
    ViewRequest
};

class VisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        request()->merge([
            'flag' => request()->flag ?? 'rawat-jalan',
        ]);
        return $this->getVisitRegistrationPaginate(function($query){
            $query->when($this->isDoctor(),function($query){
                $query->whereHas('practitionerEvaluation',function($query){
                    $query->where('practitioner_type','Employee')
                        ->where('practitioner_id',$this->global_employee->getKey());
                });
            });
        });
    }
}
