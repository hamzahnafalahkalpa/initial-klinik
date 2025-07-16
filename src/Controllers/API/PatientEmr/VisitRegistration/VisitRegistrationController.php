<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\{
    ViewRequest, ShowRequest, DeleteRequest
};
use Illuminate\Support\Str;

class VisitRegistrationController extends EnvironmentController
{
    protected function commonRequest(){
        $medic_service_label = Str::upper(Str::snake(request()->search_medic_service_label ?? request()->flag ?? 'RAWAT JALAN',' '));
        request()->merge([
            'search_medic_service_label' => $medic_service_label,
        ]);
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
