<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Laboratorium;

use Projects\Klinik\Requests\API\PatientEmr\Laboratorium\{
    ViewRequest, ShowRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;

class LaboratoriumController extends EnvironmentController
{
    protected function commonConditional($query){
        $query->when($this->isPerawat(),function($query){
            request()->merge([
                'search_medic_service_label' => 'UGD'
            ]);
        });
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
